<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id'); // Đặt tên user_id thay vì id
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number')->nullable(); // Số điện thoại, có thể để trống
            $table->string('image_profile')->nullable(); // Đường dẫn ảnh đại diện
            $table->boolean('is_active')->default(true); // Trạng thái kích hoạt
            $table->date('birthday')->nullable(); // Ngày sinh
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // Giới tính
            $table->timestamps(); // created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
