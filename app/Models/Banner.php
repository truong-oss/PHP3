<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    //
    use HasFactory,SoftDeletes;
    protected $table = 'banners';
    protected $fillable = [
        'tieu_de',
        'image_url',
        'trang_thai',
    ];
    protected $date = ['deleted_at'];

}
