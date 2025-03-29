<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    //
    use HasFactory,SoftDeletes;
    protected $table = 'contacts';
    protected $fillable = [
        'ten',
        'email',
        'phone',
        'tin_nhan'
    ];
    protected $date = ['deleted_at'];

}
