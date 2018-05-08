<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'comments', 'systemID', 'entity', 'entityID', 'imageFileName', 'share', 'userID'
    ];
}
