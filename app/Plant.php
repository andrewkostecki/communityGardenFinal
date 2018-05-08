<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [
        'name', 'comments', 'systemID', 'planttypeID', 'roomID', 'imageFileName', 'planterID', 'soiltypeID'
    ];
}
