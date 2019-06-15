<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, App\Category, App\Items, App\Http\Controllers\Controller;

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
        $menu = array(
            'MENU' => Category::menu(),
            'ELEMENTS' => Category::all(),
            'ITEMS' => Items::all()
        );
        return view('category.index')->with('menu', $menu);
    }
}
