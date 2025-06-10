<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ - Danh sách sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Danh sách sản phẩm</h1>
    <ul class="list-group">
        @foreach($products as $product)
            <li class="list-group-item">
                <a href="{{ route('products.show', $product) }}">
                    {{ $product->name }} - {{ number_format($product->price, 0, ',', '.') }} VNĐ
                </a>
            </li>
        @endforeach
    </ul>
    
</div>
</body>
</html>
