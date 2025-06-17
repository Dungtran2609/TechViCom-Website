@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Chi tiết đơn hàng</h1>
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        <!-- Back Button -->
        <a href="{{ route('admin.order.index') }}" class="btn btn-secondary mb-3">Quay lại danh sách</a>

        <!-- Order Details -->
        <div class="card">
            <div class="card-header">
                <h4>Đơn hàng #{{ $order->order_id }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Khách hàng:</strong> {{ $order->user->name ?? 'N/A' }}</p>
                        <strong>Địa chỉ giao hàng:</strong>
                        {{ $order->address ? ($order->address->address_line . ', ' . $order->address->ward . ', ' . $order->address->district . ', ' . $order->address->city) : 'Chưa có địa chỉ' }}<br>
                        <!-- <strong>Ngày giao hàng:</strong> {{ $order->shipping_date ? $order->shipping_date->format('d/m/Y') : 'Chưa xác định' }}<br> -->
                        <strong>Ngày giao hàng:</strong>
                        {{ $order->shipping_date ? \Carbon\Carbon::parse($order->shipping_date)->format('d/m/Y') : 'Chưa xác định' }}<br>
                        <p><strong>Trạng thái:</strong> {{ ucfirst(str_replace('_', ' ', $order->status)) }}</p>
                        <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
                        <p><strong>Tổng tiền:</strong> {{ number_format($order->total_amount, 2) }} VND</p>
                        <p><strong>Ngày tạo:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                        <p><strong>Ngày cập nhật:</strong> {{ $order->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Items Table -->
        <h5 class="mt-4">Chi tiết đơn hàng</h5>
        @if ($order->orderItems->isNotEmpty())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Thương hiệu</th>
                        <th>Danh mục</th>
                        <th>Biến thể</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->variant_id }}</td>
                            <td>{{ $item->productVariants->product->name ?? 'N/A' }}</td>
                            <td>{{ $item->productVariants->product->brand->name ?? 'N/A' }}</td>
                            <td>{{ $item->productVariants->product->category->name ?? 'N/A' }}</td>
                            <td>
                                <ul class="list-unstyled mb-0">
                                    <li><strong>RAM:</strong> {{ $item->productVariants->ram ?? 'N/A' }}</li>
                                    <li><strong>ROM:</strong> {{ $item->productVariants->rom ?? 'N/A' }}</li>
                                    <li><strong>Màu sắc:</strong> {{ $item->productVariants->color ?? 'N/A' }}</li>
                                    <li><strong>Chất liệu:</strong> {{ $item->productVariants->material ?? 'N/A' }}</li>
                                    <li><strong>Tồn kho:</strong> {{ $item->productVariants->stock ?? 0 }}</li>
                                    <li><strong>Giá Giảm:</strong>
                                        {{ number_format($item->productVariants->price ?? $item->price, 2) }} VND</li>
                                    <!-- <li><strong>Tên biến thể:</strong> {{ $item->productVariants->name ?? 'N/A' }}</li> -->
                                </ul>
                                @if (!$item->productVariants)
                                    <small class="text-danger">Không có biến thể!</small>
                                @endif
                            </td>
                            <!-- <td>{{ $item->productVariants->name ?? ($item->productVariants->ram . ' ' . $item->productVariants->color ?? 'N/A') }}</td> -->
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price, 2) }} VND</td>
                            <td>{{ number_format($item->quantity * $item->price, 2) }} VND</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">Không có sản phẩm nào trong đơn hàng.</div>
        @endif

        <!-- Actions -->
        <div class="mt-3">
            <a href="{{ route('admin.order.index') }}" class="btn btn-secondary btn-sm">Quay lại</a>
            <a href="{{ route('admin.order.edit', $order->order_id) }}" class="btn btn-warning btn-sm">Sửa</a>
            <form action="{{ route('admin.order.destroy', $order->order_id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')">Xóa</button>
            </form>
        </div>
    </div>
@endsection