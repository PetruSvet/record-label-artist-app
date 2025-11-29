<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Recordlabel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'founded',
        'headquarters',
        'phone_number',
    ];

    // Relationship: a record label can have many artists
    // Recordlabel.php
public function artists()
{
    return $this->belongsToMany(Artist::class);
}


    
}
