<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecordLabel extends Model
{
    public function artists()
{
    return $this->belongsToMany(Artist::class, 'recordlabel_artist');
}

}
