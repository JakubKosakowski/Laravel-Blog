<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'comment'
    ];

    public function posts(): BelongsTo {
        return $this->belongsTo(Post::class);
    }

    public function users(): BelongsTo {
        return $this->belongsTo(Users::class);
    }
}