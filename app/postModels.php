<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postModels extends Model
{
    //
    protected $fillable = [
        'title', 'descrption', 'author', 'category',
    ];
}
