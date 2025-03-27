<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // để sd được factory tạo dữ liệu mẫu t cần phải sử dụng thư viện
    use HasFactory;
    // qquy định model này thao tcasc với bảng nào 
    protected $table = 'categories';
    //các trường trog bảng đều phải đưa vào fillable
    protected $fillable = [
        'ten_danh_muc',
        'trang_thai'
    ];
    //tạo model của product
    //tạo mối liên hệ vs product
    public function product()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
