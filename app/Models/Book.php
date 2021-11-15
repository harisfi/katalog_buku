<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function bookCategory()
    {
        return $this->belongsTo(BookCategory::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}
