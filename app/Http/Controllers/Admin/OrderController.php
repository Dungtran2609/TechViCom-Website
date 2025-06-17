<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index()
    {
        $query = Order::with('user');
        if (request()->has('search')) {
            $search = request('search');
            $query->where('order_id', 'like', "%{$search}%")
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
        }
        $orders = $query->latest('created_at')->paginate(10);
        \Log::info('Total orders: ' . $orders->total()); // Debug số lượng bản ghi
        return view('admin.oders.listOders', compact('orders'));
    }

    /**
     * Display the specified order.
     */

    public function show($id)
    {
        $order = Order::with([
            'orderItems.productVariants',
            'orderItems.productVariants.product.brand',
            'orderItems.productVariants.product.category',
        ])->findOrFail($id);

        return view('admin.oders.detailOders', compact('order'));
    }
     

/**
     * Hiển thị form chỉnh sửa đơn hàng.
     */
    public function edit($id)
    {
        $order = Order::with([
            'orderItems.productVariants',
            'orderItems.productVariants.product.brand',
            'orderItems.productVariants.product.category',
        ])->findOrFail($id);

        return view('admin.oders.updateOders', compact('order'));
    }

    /**
     * Cập nhật thông tin đơn hàng.
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
    
        // Validate dữ liệu với thông báo tiếng Việt
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,shipping,completed,cancelled',
            'payment_method' => 'required|in:cod,banking,momo',
            'shipping_address' => 'required|string|max:255',
            'shipping_date' => 'required|date|after_or_equal:today',
            'total_amount' => 'required|numeric|min:0',
            'order_items.*.quantity' => 'nullable|integer|min:1',
            'order_items.*.price' => 'nullable|numeric|min:0',
        ], [
            'status.required' => 'Trạng thái là bắt buộc.',
            'status.in' => 'Trạng thái không hợp lệ.',
            'payment_method.required' => 'Phương thức thanh toán là bắt buộc.',
            'payment_method.in' => 'Phương thức thanh toán không hợp lệ.',
            'shipping_address.required' => 'Địa chỉ giao hàng là bắt buộc.',
            'shipping_address.string' => 'Địa chỉ giao hàng phải là chuỗi ký tự.',
            'shipping_address.max' => 'Địa chỉ giao hàng không được dài quá 255 ký tự.',
            'shipping_date.required' => 'Ngày giao hàng là bắt buộc.',
            'shipping_date.date' => 'Ngày giao hàng không hợp lệ.',
            'shipping_date.after_or_equal' => 'Ngày giao hàng phải là hôm nay hoặc sau hôm nay.',
            'total_amount.required' => 'Tổng tiền là bắt buộc.',
            'total_amount.numeric' => 'Tổng tiền phải là số.',
            'total_amount.min' => 'Tổng tiền phải lớn hơn hoặc bằng 0.',
            'order_items.*.quantity.integer' => 'Số lượng sản phẩm phải là số nguyên.',
            'order_items.*.quantity.min' => 'Số lượng sản phẩm phải lớn hơn hoặc bằng 1.',
            'order_items.*.price.numeric' => 'Giá sản phẩm phải là số.',
            'order_items.*.price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0.',
        ]);
    
        // Cập nhật thông tin đơn hàng
        $order->update([
            'status' => $request->status,
            'payment_method' => $request->payment_method,
            'shipping_date' => $request->shipping_date,
            'total_amount' => $request->total_amount,
        ]);
    
        // Cập nhật order_items (nếu có)
        if ($request->has('order_items')) {
            foreach ($request->order_items as $itemId => $itemData) {
                $orderItem = OrderItem::find($itemId);
                if ($orderItem) {
                    $orderItem->update([
                        'quantity' => $itemData['quantity'] ?? $orderItem->quantity,
                        'price' => $itemData['price'] ?? $orderItem->price,
                    ]);
                }
            }
        }
    
        return redirect()->route('admin.order.show', $order->order_id)->with('success', 'Cập nhật đơn hàng thành công');
    }




    
    
    public function destroy(Order $order)
    {
        $orderId = $order->order_id;
        $order->delete();
        return redirect()->route('admin.order.index')->with('success', "Đơn hàng #{$orderId} đã được xóa thành công.");
    }

    public function trashed()
    {
        $orders = Order::onlyTrashed()->with('user')->latest('deleted_at')->paginate(10);
        return view('admin.oders.trashed', compact('orders'));
    }

    public function restore($id)
    {
    $order   = Order::onlyTrashed()->findOrFail($id);
    $orderId = $order->order_id;
    $order->restore();
    return redirect()->route('admin.order.trashed')->with('success', "Đơn hàng #{$orderId} đã được khôi phục thành công.");
    }

    public function forceDelete($id)
    {
        $order   = Order::onlyTrashed()->findOrFail($id);
        $orderId = $order->order_id;
        $order->forceDelete();
        return redirect()->route('admin.order.trashed')->with('success', "Đơn hàng #{$orderId} đã được xóa vĩnh viễn.");
    }
}
