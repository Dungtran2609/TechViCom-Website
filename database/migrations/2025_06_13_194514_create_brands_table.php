<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id('brand_id');                   // bigint [pk]
            $table->string('name', 100)->unique();    // varchar(100) [unique]
            $table->string('slug', 100)->nullable();  // varchar(100)
            $table->text('description')->nullable();  // text
            $table->string('image')->nullable();      // Cột image để lưu đường dẫn/tên file hình ảnh
            $table->boolean('status')->default(true); // Thêm cột status, mặc định là true (hiển thị)
            $table->softDeletes();                    // Cột deleted_at cho soft deletes
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
