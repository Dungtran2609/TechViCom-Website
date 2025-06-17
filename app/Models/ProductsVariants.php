<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductsVariants extends Model
{
    use HasFactory;

    protected $table      = 'product_variants'; // Định nghĩa tên bảng
    protected $primaryKey = 'variant_id';       // Định nghĩa khóa chính
    public $incrementing  = false;              // Vì variant_id là bigint không tự tăng
    protected $fillable   = [
        'variant_id','product_id', 'ram', 'rom', 'color', 'material', 'stock', 'price_dis','name'
    ]; // Các cột có thể gán giá trị

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'product_id');
    }
}
