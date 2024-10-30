<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Animations extends Model
{
    use HasFactory;
    protected $table = 'Animations';
    protected $fillable = [
        'name',
        'description',
        'release_year',
        'image',
        'type_id',
        'studio_id',
        'category_id',
        'user_id'
    ];
    public function hasReviewFromUser($userId)
    {
        return Comment::where('user_id', $userId)->where('animation_id', $this->id)->exists();
    }
    public function genres():BelongsToMany
    {
        return $this->belongsToMany(Genres::class,'animations_genres','animation_id','genre_id');
    }
    public function countries():BelongsToMany
    {
        return $this->belongsToMany(Countries::class,'animations_countries','animation_id','country_id');
    }
    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class,'animations_liked','animation_id','user_id');
    }
    public function comments():HasMany
    {
        return $this->HasMany(Comment::class,'animation_id');
    }
    public function getAverageRatingAttribute()
    {
        $avgRating = $this->comments->avg('rating');
        return round($avgRating,1);
    }
    public function studio():BelongsTo
    {
        return $this->belongsTo(Studios::class, 'studio_id');
    }
    public function type():BelongsTo
    {
        return $this->belongsTo(Types::class, 'type_id');
    }
    public function category():BelongsTo
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function heroes():HasMany
    {
        return $this->hasMany(Heroes::class, 'animation_id');
    }
    public function episodes():HasMany
    {
        return $this->hasMany(Episodes::class, 'animation_id');
    }

}
