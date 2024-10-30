<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Countries extends Model
{
    use HasFactory;
    protected $table = 'Countries';
    protected $fillable = [
        'name',
    ];

    public function studios()
    {
        return $this->hasMany(Studios::class, 'studio_id');
    }
    public function actors()
    {
        return $this->hasMany(Actors::class, 'actor_id');
    }
    public function animations():BelongsToMany
    {
        return $this->belongsToMany(Animations::class,'animations_countries','country_id','animation_id');
    }
}
