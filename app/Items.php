<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'DATE',
        'USER_ID',
        'CATEGORY_ID',
        'PRICE',
        'COMMENTS',
    ];
}
