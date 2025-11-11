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
        'record_label',
    ];


    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
