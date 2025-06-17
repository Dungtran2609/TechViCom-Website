<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
// Thêm trait này
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model

{
    use HasFactory; // Sử dụng trait

    protected $table      = 'products';
    protected $primaryKey = 'product_id';
    public $incrementing  = false; // Vì product_id là bigint không tự tăng
    protected $fillable   = ['category_id', 'brand_id', 'name', 'price', 'discount_price', 'description', 'status', 'created_by', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }
    public function productVariants()
    {
        return $this->hasMany(ProductsVariants::class, 'product_id', 'product_id');
    }
}
