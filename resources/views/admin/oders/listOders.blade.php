@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Quản lý đơn hàng</h1>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.order.trashed') }}" class="btn btn-danger">
                    <i class="fas fa-trash"></i> Thùng rác
                </a>
            </div>
        </div>
        <!-- Search Form -->
        <form method="GET" action="{{ route('admin.order.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm theo mã đơn hoặc tên khách hàng"
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>
        @if (request()->has('search'))
            <div class="mb-4">
                <a href="{{ route('admin.order.index') }}" class="btn btn-secondary">
                    <i class="fas fa-list"></i> Quay lại danh sách đầy đủ
                </a>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Orders Table with Accordion -->
        <div class="accordion" id="ordersAccordion">
            @forelse ($orders as $order)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $order->order_id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $order->order_id }}" aria-expanded="false"
                            aria-controls="collapse{{ $order->order_id }}">
                            <div class="row w-100">
                                <div class="col">Mã đơn: {{ $order->order_id }}</div>
                                <div class="col">Khách hàng: {{ $order->user->name ?? 'N/A' }}</div>
                                <div class="col">Trạng thái: {{ ucfirst(str_replace('_', ' ', $order->status)) }}</div>
                                <div class="col">Tổng tiền: {{ number_format($order->total_amount, 2) }} VND</div>
                            </div>
                        </button>
                    </h2>
                    <div id="collapse{{ $order->order_id }}" class="accordion-collapse collapse"
                        aria-labelledby="heading{{ $order->order_id }}" data-bs-parent="#ordersAccordion">
                        <div class="accordion-body">
                            <!-- Order Details -->
                            <div class="mb-3">
                                <strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}<br>
                                <!-- <strong>Địa chỉ giao hàng:</strong> {{ $order->address->address ?? 'Chưa có địa chỉ' }}<br> -->
                                <strong>Địa chỉ giao hàng:</strong>
                                {{ $order->address ? ($order->address->address_line . ', ' . $order->address->ward . ', ' . $order->address->district . ', ' . $order->address->city) : 'Chưa có địa chỉ' }}<br>
                                <!-- <strong>Ngày giao hàng:</strong> {{ $order->shipping_date ? $order->shipping_date->format('d/m/Y') : 'Chưa xác định' }}<br> -->
                                <strong>Ngày giao hàng:</strong>
                                {{ $order->shipping_date ? \Carbon\Carbon::parse($order->shipping_date)->format('d/m/Y') : 'Chưa xác định' }}<br>
                                <strong>Ngày tạo:</strong> {{ $order->created_at->format('d/m/Y H:i') }}<br>
                                <strong>Ngày cập nhật:</strong> {{ $order->updated_at->format('d/m/Y H:i') }}
                            </div>

                            Order Items Table
                            <h5>Chi tiết đơn hàng</h5>
                            @if ($order->orderItems && $order->orderItems->isNotEmpty())
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
                            <td>{{ $item->productVariants->name ?? 'N/A' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price, 2) }} VND</td>
                            <td>{{ number_format($item->quantity * $item->price, 2) }} VND</td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                            @else
                            <div class="alert alert-info">Không có sản phẩm nào.</div>
                            @endif
                            <!-- Actions -->
                            <div class="mt-3">
                                <a href="{{ route('admin.order.show', $order) }}" class="btn btn-info btn-sm">Xem</a>
                                <a href="{{ route('admin.order.edit', $order) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('admin.order.destroy', $order) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dark btn-sm"
                                        onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')">Xóa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">Không có đơn hàng nào.</div>
            @endforelse
        </div>

        <!-- Pagination -->
        {{ $orders->links('pagination::bootstrap-5') }}
    </div>
@endsection