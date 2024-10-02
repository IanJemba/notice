<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'color',
        'disable_comments',
        'hide_notice',
    ];

    public function notices()
    {
        return $this->belongsToMany(Notice::class, 'markingnotice');
    }

}
