<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bukus()
    {
        return $this->belongsToMany(Buku::class, 'tag_bukus');
    }
}
