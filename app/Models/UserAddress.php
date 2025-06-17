<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddress extends Model
{
    /** @use HasFactory<\Database\Factories\UserAddressFactory> */
    use HasFactory,SoftDeletes;
    // Tên bảng nếu khác mặc định
    protected $table = 'user_addresses';

    // Khóa chính (vì Laravel mặc định là "id")
    protected $primaryKey = 'address_id';

    // Tắt timestamps mặc định nếu bạn chỉ có created_at
    public $timestamps = false;

    // Các trường được phép gán dữ liệu hàng loạt
    protected $fillable = [
        'user_id',
        'address_line',
        'ward',
        'district',
        'city',
        'is_default',
        'created_at',
    ];

    // Mối quan hệ: mỗi địa chỉ thuộc về 1 user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
