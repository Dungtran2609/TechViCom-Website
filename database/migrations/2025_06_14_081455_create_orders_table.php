<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigInteger('order_id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('address_id'); // Cột address_id
            $table->string('status', 100)->default('đang chờ');
            $table->string('payment_method', 100)->default('thanh toán khi nhận hàng');
            $table->decimal('total_amount', 10, 2);
            $table->date('shipping_date')->nullable(); // Cột shipping_date, cho phép null
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();

            // Ràng buộc khóa ngoại cho user_id
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            // Ràng buộc khóa ngoại cho address_id
            $table->foreign('address_id')
                ->references('address_id') // Giả định address_id là khóa chính của user_addresses
                ->on('user_addresses')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
