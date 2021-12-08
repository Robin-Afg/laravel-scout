<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;
    use Searchable;
    

    protected $fillable = [
        'title',
        'description',
    ];


    Public function user() {
        return $this->belongsTo(Post::class);
    }
}
