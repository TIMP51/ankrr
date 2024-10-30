<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Actors extends Model
{
    use HasFactory;
    protected $table = 'Actors';
    protected $fillable = [
        'first_name', 'last_name', 'father_name', 'image', 'country_id', 'birth'
    ];
    public function comments():HasMany
    {
        return $this->HasMany(Heroes::class,'hero_id');
    }
    public function country():BelongsTo
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }
    public function heroes():HasMany
    {
        return $this->hasMany(Heroes::class, 'actor_id');
    }
}
