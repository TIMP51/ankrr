<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Heroes extends Model
{
    protected $table = 'Heroes';
    protected $fillable = [
        'first_name', 'name', 'nickname', 'description', 'animation_id', 'actor_id'
    ];
    public function animation():BelongsTo
    {
        return $this->belongsTo(Animations::class, 'animation_id');
    }
    public function actor():BelongsTo
    {
        return $this->BelongsTo(Actors::class, 'actor_id');
    }
}
