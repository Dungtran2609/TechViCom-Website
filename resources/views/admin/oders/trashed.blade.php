@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Danh sách đơn hàng đã xóa</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($orders->isEmpty())
            <div class="alert alert-info">Không có đơn hàng nào trong thùng rác.</div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Trạng thái</th>
                        <th>Tổng tiền</th>
                        <th>Ngày xóa</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ number_format($order->total_amount, 2) }} VND</td>
                            <td>{{ $order->deleted_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <form action="{{ route('admin.order.restore', $order->order_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Khôi phục</button>
                                </form>
                                <form action="{{ route('admin.order.force-delete', $order->order_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn?')">Xóa vĩnh viễn</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('admin.order.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
    </div>
@endsection