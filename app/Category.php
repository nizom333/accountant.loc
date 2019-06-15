<?php

namespace App;

use Illuminate\Database\Eloquent\Model, Illuminate\Support\Str;

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

    /**
     * Меню
     */
    public static function menu()
    {
        $allCategories = Category::all();
        $arResult = [];
        foreach($allCategories as $category){
            if(isset($category->parent_id)){
                $arResult[$category->parent_id]['CHILD'][$category->id]['NAME'] = $category->title;
                $arResult[$category->parent_id]['CHILD'][$category->id]['ID'] = $category->id;
            }
            else
            {
                $arResult[$category->id]['NAME'] = $category->title;
                $arResult[$category->id]['ID'] = $category->id;
                $arResult[$category->id]['CLASS'] = $category->class;
            }
        }
        return $arResult;
    }
}
