<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table      = 'orders';
    protected $primaryKey = 'order_id';
    public $incrementing  = false;
    protected $fillable   = [
        'order_id', // Thêm để cho phép gán giá trị cho khóa chính
        'user_id',
        'address_id', // Thêm để cho phép gán giá trị
        'status',
        'payment_method',
        'total_amount',
        'shipping_date', // Thêm để cho phép gán giá trị
        'created_at',
        'updated_at',
    ];
    // protected $dates = ['shipping_date'];
    // Sử dụng $casts thay vì $dates
    protected $casts = [
        'shipping_date' => 'date',
        // Hoặc sử dụng 'datetime' nếu bạn muốn lưu cả giờ
        // 'shipping_date' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id'); // Chỉnh sửa để rõ ràng khóa ngoại và khóa chính
    }

    public function address()
    {
        return $this->belongsTo(UserAddress::class, 'address_id', 'address_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }
}
