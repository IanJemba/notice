<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marking extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'color',
    ];

    public function notice()
    {
        return $this->belongsTo(Notice::class);
    }
}
