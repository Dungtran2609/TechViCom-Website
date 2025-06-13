<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Thêm dòng này

class Brand extends Model
{
    use HasFactory,SoftDeletes; // Thêm trait này

    protected $primaryKey = 'brand_id';
    protected $fillable   = ['name', 'slug', 'description','image','status'];
    protected $dates      = ['deleted_at']; // Nếu dùng soft deletes
}