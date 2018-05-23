<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'DATE',
        'PRICE',
        'COMMENTS',
    ];
}
