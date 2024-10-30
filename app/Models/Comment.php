<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['text'];

    public function animations():BelongsTo
    {
        return $this->BelongsTo(Animations::class, 'animation_id');
    }

    public function user():BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id');
    }
}
