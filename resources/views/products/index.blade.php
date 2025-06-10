@extends('layouts.app')

@section('content')
    <h1>Danh sách sản phẩm</h1>
    <ul>

        @foreach($products as $product)
            <li>
                <a href="{{ route('products.show', $product) }}">
                    {{ $product->name }} - {{ number_format($product->price, 0, ',', '.') }} VNĐ
                </a>
            </li>
        @endforeach
    </ul>
    <div class="mt-3">
        {{ $products->links() }}
    </div>
@endsection