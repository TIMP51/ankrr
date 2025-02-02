<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'Categories';
    protected $fillable = [
        'name',
    ];

    public function animations():HasMany
    {
        return $this->hasMany(Animations::class, 'animation_id');
    }
}
