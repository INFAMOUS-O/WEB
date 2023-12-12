<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'description',
        'image',
    ];

    
    public function post()
    {
        return $this->belongsToMany(User::class);
    }
    public function comments()
{
    return $this->hasMany(Comment::class);
}


}
