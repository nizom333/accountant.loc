<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'items';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'DATE',
        'USER_ID',
        'CATEGORY_ID',
        'PRICE',
        'COMMENTS',
    ];
}
