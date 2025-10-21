<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    //allow mass assignment for these fields
    protected $fillable = [
        'name',
        'genre',
        'debut_year',
        'social_media_handle',
        'description',
        'profile_picture',
        'embed',
    ];
}
