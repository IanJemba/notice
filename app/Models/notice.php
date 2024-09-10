<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notice extends Model
{
    use HasFactory;

    protected $fillables = [
        'title',
        'description',
        'user_id',
        'categoory_id'
    ];
}
