<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantType extends Model
{
    protected $fillable = [
        'name', 'comments', 'systemID'
    ];
}
