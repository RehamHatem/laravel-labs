<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = ['title', 'description', 'user_id', 'slug'];
    
    function user()
    {
       return $this->belongsTo(User::class);
    }

    function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    protected function createdAt():Attribute
{
    return new Attribute(
        get: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
    );
}

protected static function boot()
{
    parent::boot();

    static::creating(function ($post) {
        $post->slug = str($post->title)->slug();
    });

    static::updating(function ($post) {
        $post->slug = str($post->title)->slug();
    });
}
}