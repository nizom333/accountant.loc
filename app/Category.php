<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'title',
        'parent_id',
        'class',
      ];
}
