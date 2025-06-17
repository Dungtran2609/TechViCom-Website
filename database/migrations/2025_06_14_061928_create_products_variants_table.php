<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->bigInteger('variant_id')->primary();
            $table->BigInteger('product_id');
            $table->string('ram', 50);
            $table->string('rom', 50);
            $table->string('color', 50);
            $table->string('material', 50);
            $table->integer('stock');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
