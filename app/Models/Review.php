<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reviews';

    protected $fillable = [
        'reviewer_name',
        'rating',
        'comment',
        'post_id',
    ];

    protected $dates = ['deleted_at'];

    // Quan hệ đúng: Một đánh giá thuộc về một bài viết
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}

