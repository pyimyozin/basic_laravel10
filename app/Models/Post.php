<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    const EXCERPT_LENGTH = 50;
    protected $fillable = ['title','image'];

    public function excerpt() {
        return Str::limit($this->content,Post::EXCERPT_LENGTH);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

