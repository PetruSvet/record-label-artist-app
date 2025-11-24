<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist_id',
        'release_date',
        'genre',
        'duration',
    ];


    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function recordLabel()
    {
    return $this->belongsTo(Recordlabel::class);
    }

}
