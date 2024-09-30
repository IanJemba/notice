<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class markingnotice extends Model
{
    use HasFactory;

    public function notice()
    {
        return $this->belongsTo(Notice::class);
    }

    public function marking()
    {
        return $this->belongsTo(Marking::class);
    }
}
