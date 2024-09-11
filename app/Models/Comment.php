<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPUnit\Framework\TestStatus\Notice;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'comment_id';
    protected $fillable = ['content', 'user_id', 'notice_id'];

    public function notice()
    {
        return $this->belongsTo(Notice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
