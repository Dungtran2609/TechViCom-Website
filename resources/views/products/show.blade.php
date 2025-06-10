@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>
    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-thumbnail mb-3" style="max-width:300px;">
    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>ID:</strong> {{ $product->id }}</li>
        <li class="list-group-item"><strong>Slug:</strong> {{ $product->slug }}</li>
        <li class="list-group-item"><strong>Category ID:</strong> {{ $product->category_id }}</li>
        <li class="list-group-item"><strong>Brand ID:</strong> {{ $product->brand_id }}</li>
        <li class="list-group-item"><strong>Supplier ID:</strong> {{ $product->supplier_id }}</li>
        <li class="list-group-item"><strong>Số lượng:</strong> {{ $product->quantity }}</li>
        <li class="list-group-item"><strong>Giá:</strong> {{ number_format($product->price, 0, ',', '.') }} VNĐ</li>
        <li class="list-group-item"><strong>Giảm giá:</strong> {{ number_format($product->discount, 0, ',', '.') }} VNĐ</li>
        <li class="list-group-item"><strong>Trạng thái:</strong> {{ $product->status ? 'Hiển thị' : 'Ẩn' }}</li>
        <li class="list-group-item"><strong>Ngày tạo:</strong> {{ $product->created_at }}</li>
        <li class="list-group-item"><strong>Ngày cập nhật:</strong> {{ $product->updated_at }}</li>
    </ul>
    <p><strong>Mô tả:</strong> {{ $product->description }}</p>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
@endsection