<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

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
        // $cats = Category::all();
        // $menu = [];
        // foreach($cats as $cat){
        //     if(isset($cat->parent_id)){
        //         $menu[$cat->parent_id]['CHILD'][$cat->id]['NAME'] = $cat->title;
        //         $menu[$cat->parent_id]['CHILD'][$cat->id]['ID'] = $cat->id;
        //     }else{
        //         $menu[$cat->id]['NAME'] = $cat->title;
        //         $menu[$cat->id]['ID'] = $cat->id;
        //     }
        // }
        // return view('dashboard')->with('menu', $menu);
    }
}
