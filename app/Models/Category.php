<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // để sd đc facories tạo dữ liệu mẫu ta cần phải sd thư viện 
    use HasFactory,SoftDeletes;
    // quy định model này thao tac với bảng nào
    protected $table = 'categories';
    // các trường trong bảng đều phải đưa vào fillable
    protected $fillable = [
        'ten_danh_muc',
        'trang_thai'
    ];
    protected $date = ['deleted_at'];

    // tạo liên hệ với products
    public function products(){
        return $this->hasMany(Product::class,'category_id');
    }
}
