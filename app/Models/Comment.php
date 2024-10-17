<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use HasFactory, Notifiable;

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