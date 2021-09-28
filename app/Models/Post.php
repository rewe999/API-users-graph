<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    public $timestamps = true;

    protected $fillable = [
        "title",
        "body",
        "userId",
        "created_at",
        "updated_at",
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
