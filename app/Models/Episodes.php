<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episodes extends Model
{
    use HasFactory;
    protected $table = 'Episodes';
    protected $fillable = [
        'name', 'description','title','video', 'animation_id'
    ];
    public function getPath()
    {
        $url = 'uploads/'.$this->video;
        return $url;
    }
    public function animation():BelongsTo
    {
        return $this->belongsTo(Animations::class, 'animation_id');
    }
}
