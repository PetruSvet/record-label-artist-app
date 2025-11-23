<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RecordLabel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'headquarters',
        'phone number',
    ];

    // Relationship: a record label can have many artists
    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'recordlabel_artist');
    }
}
