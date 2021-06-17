<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'author',
        'image'
    ];
}
