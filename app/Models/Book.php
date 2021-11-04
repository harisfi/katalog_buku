<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function bookCategories()
    {
        return $this->hasMany(BookCategory::class);
    }

    public function publishers()
    {
        return $this->hasMany(Publisher::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
