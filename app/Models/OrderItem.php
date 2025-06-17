<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $table      = 'order_items';
    protected $primaryKey = 'order_item_id';
    public $incrementing  = false; // Vì order_item_id là bigint không tự tăng
    protected $fillable   = ['order_id', 'variant_id', 'quantity', 'price'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function productVariants()
    {
        return $this->belongsTo(ProductsVariants::class, 'variant_id', 'variant_id');
    }
}
