<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Items;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();
        $items = [];
        foreach($cats as $cat){
            if(isset($cat->parent_id)){
                $items[$cat->parent_id]['CHILD'][$cat->id]['NAME'] = $cat->title;
                $items[$cat->parent_id]['CHILD'][$cat->id]['ID'] = $cat->id;
            }else{
                $items[$cat->id]['NAME'] = $cat->title;
                $items[$cat->id]['ID'] = $cat->id;
                $items[$cat->id]['CLASS'] = $cat->class;
            }
        }
        $menu = array(
            'MENU'=>$items,
            'ELEMENTS'=>$cats,
        );
        return view('category.sections')->with('menu', $menu);
    }
}
