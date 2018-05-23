<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();
        $menu = [];
        foreach($cats as $cat){
            if(isset($cat->parent_id)){
                $menu[$cat->parent_id]['CHILD'][$cat->id]['NAME'] = $cat->title;
                $menu[$cat->parent_id]['CHILD'][$cat->id]['ID'] = $cat->id;
            }else{
                $menu[$cat->id]['NAME'] = $cat->title;
                $menu[$cat->id]['ID'] = $cat->id;
            }
        }
        return view('dashboard')->with('menu', $menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        $item = [];
        foreach($cats as $cat){
            if(isset($cat->parent_id)){
                $item[$cat->parent_id]['CHILD'][$cat->id]['NAME'] = $cat->title;
                $item[$cat->parent_id]['CHILD'][$cat->id]['ID'] = $cat->id;
            }else{
                $item[$cat->id]['NAME'] = $cat->title;
                $item[$cat->id]['ID'] = $cat->id;
            }
        }
        return view('category.create')->with('menu', $item);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cats = Category::all();
        $item = [];
        foreach($cats as $cat){
            if(isset($cat->parent_id)){
                $item[$cat->parent_id]['CHILD'][$cat->id]['NAME'] = $cat->title;
                $item[$cat->parent_id]['CHILD'][$cat->id]['ID'] = $cat->id;
            }else{
                $item[$cat->id]['NAME'] = $cat->title;
                $item[$cat->id]['ID'] = $cat->id;
            }
        }
        $menu = array(
            "ITEM_ONE" => $item,
            "ITEM_TWO" => $id
        );
        return view('category.index')->with('menu', $menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
