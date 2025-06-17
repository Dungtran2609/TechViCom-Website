@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Cập nhật đơn hàng</h1>

        <!-- Success and Error Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Back Button -->
        <a href="{{ route('admin.order.show', $order->order_id) }}" class="btn btn-secondary mb-3">Quay lại chi tiết</a>

        <!-- Edit Form -->
        <form action="{{ route('admin.order.update', $order->order_id) }}" method="POST" id="orderForm">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-header">
                    <h4>Thông tin đơn hàng #{{ $order->order_id }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Trạng thái</label>
                                <select name="status" id="status" class="form-control" >

                                    <option value="pending" {{ old('status', $order->status) === 'đang chờ' ? 'selected' : '' }}>Đang chờ</option>
                                    <option value="confirmed" {{ old('status', $order->status) === 'đã xác nhận' ? 'selected' : '' }}>Đã xác nhận</option>
                                    <option value="shipping" {{ old('status', $order->status) === 'đang giao' ? 'selected' : '' }}>Đang giao</option>
                                    <option value="completed" {{ old('status', $order->status) === 'hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                                    <option value="cancelled" {{ old('status', $order->status) === 'đã hủy' ? 'selected' : '' }}>Đã hủy</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="payment_method" class="form-label">Phương thức thanh toán</label>
                                <select name="payment_method" id="payment_method" class="form-control">
                                    <option value="cod" {{ old('payment_method', $order->payment_method) === 'thanh toán khi nhận hàng' ? 'selected' : '' }}>Thanh toán khi nhận hàng</option>
                                    <option value="banking" {{ old('payment_method', $order->payment_method) === 'chuyển khoản ngân hàng' ? 'selected' : '' }}>Chuyển khoản ngân hàng</option>
                                    <option value="momo" {{ old('payment_method', $order->payment_method) === 'momo' ? 'selected' : '' }}>Thanh toán qua MoMo</option>
                                </select>
                                @error('payment_method')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="shipping_address" class="form-label">Địa chỉ giao hàng</label>
                                <input type="text" name="shipping_address" id="shipping_address" class="form-control"
                                    value="{{ old('shipping_address', $order->address ? ($order->address->address_line . ', ' . $order->address->ward . ', ' . $order->address->district . ', ' . $order->address->city) : 'Chưa có địa chỉ') }}"
                                    required readonly>
                                @error('shipping_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="shipping_date" class="form-label">Ngày giao hàng</label>
                                <input type="date" name="shipping_date" id="shipping_date" class="form-control"
                                    value="{{ old('shipping_date', $order->shipping_date ? \Carbon\Carbon::parse($order->shipping_date)->format('Y-m-d') : '') }}"
                                    >
                                @error('shipping_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="total_amount" class="form-label">Tổng tiền</label>
                                <input type="number" name="total_amount" id="total_amount" class="form-control" step="0.01"
                                    value="{{ old('total_amount', $order->total_amount) }}" required readonly>
                                @error('total_amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Items Table -->
            <h5 class="mt-4">Chi tiết đơn hàng</h5>
            @if ($order->orderItems->isNotEmpty())
                <table class="table table-bordered" id="orderItemsTable">
                    <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Thương hiệu</th>
                            <th>Biến thể</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $index => $item)
                            <tr>
                                <td>
                                    {{ $item->variant_id }}
                                    <input type="hidden" name="order_items[{{ $index }}][variant_id]" value="{{ $item->variant_id }}">
                                </td>
                                <td>{{ $item->productVariants->product->name ?? 'N/A' }}</td>
                                <td>{{ $item->productVariants->product->brand->name ?? 'N/A' }}</td>
                                <td>
                                    <ul class="list-unstyled mb-0">
                                        <li><strong>RAM:</strong> {{ $item->productVariants->ram ?? 'N/A' }}</li>
                                        <li><strong>ROM:</strong> {{ $item->productVariants->rom ?? 'N/A' }}</li>
                                        <li><strong>Màu sắc:</strong> {{ $item->productVariants->color ?? 'N/A' }}</li>
                                        <li><strong>Chất liệu:</strong> {{ $item->productVariants->material ?? 'N/A' }}</li>
                                        <li><strong>Tồn kho:</strong> {{ $item->productVariants->stock ?? 0 }}</li>
                                        <li><strong>Giá Giảm:</strong>
                                            {{ number_format($item->productVariants->price ?? $item->price, 2) }} VND</li>
                                    </ul>
                                    @if (!$item->productVariants)
                                        <small class="text-danger">Không có biến thể!</small>
                                    @endif
                                </td>
                                <td>
                                    <input type="number" name="order_items[{{ $index }}][quantity]" class="form-control quantity" min="1"
                                        value="{{ old('order_items.' . $index . '.quantity', $item->quantity) }}">
                                </td>
                                <td>
                                    {{ number_format($item->price, 2) }} VND
                                    <input type="hidden" name="order_items[{{ $index }}][price]" value="{{ $item->price }}">
                                </td>
                                <td class="item-total">{{ number_format($item->quantity * $item->price, 2) }} VND</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info">Không có sản phẩm nào trong đơn hàng.</div>
            @endif

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Cập nhật đơn hàng</button>
        </form>
    </div>

    <!-- JavaScript to Update Totals -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const quantityInputs = document.querySelectorAll('.quantity');
            const totalAmountInput = document.getElementById('total_amount');

            function updateTotals() {
                let orderTotal = 0;
                document.querySelectorAll('#orderItemsTable tbody tr').forEach(row => {
                    const quantity = parseInt(row.querySelector('.quantity').value) || 0;
                    const price = parseFloat(row.querySelector('input[name$="[price]"]').value) || 0;
                    const itemTotal = quantity * price;
                    row.querySelector('.item-total').textContent = itemTotal.toFixed(2) + ' VND';
                    orderTotal += itemTotal;
                });
                totalAmountInput.value = orderTotal.toFixed(2);
            }

            quantityInputs.forEach(input => {
                input.addEventListener('input', updateTotals);
            });

            // Initial calculation
            updateTotals();
        });
    </script>
@endsection