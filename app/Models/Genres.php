<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genres extends Model
{
    use HasFactory;
    protected $table = 'Genres';
    protected $fillable = [
        'name',
    ];
    public function animations():BelongsToMany
    {
        return $this->belongsToMany(Animations::class,'animations_genres','genre_id','animation_id');
    }
}
