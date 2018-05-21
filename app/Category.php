<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Category extends Model
{
    /*
	// Mass assigned
    protected $fillable = ['title', 'parent_id'];

	// Get children category
    public function children() {
      return $this->hasMany(self::class, 'parent_id');
    }
    */
}
