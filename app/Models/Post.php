<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'tieu_de',
        'bai_viet',
        'tac_gia',
        'trang_thai',
    ];

    protected $dates = ['deleted_at'];

    // Một bài viết có nhiều đánh giá
    public function reviews()
    {
        return $this->hasMany(Review::class, 'post_id');
    }
}
