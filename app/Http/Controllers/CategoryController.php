<?php

namespace App\Http\Controllers;

use App\Category, App\Items, Redirect, Auth, Illuminate\Http\Request, App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items_el = Items::orderBy('ID', 'desc')->get();
        $list = [];
        foreach($items_el as $i){
            if($i->USER_ID == Auth::id()){
                $list[$i->ID]['ID'] = $i->ID;
                $list[$i->ID]['CATEGORY_ID'] = $i->CATEGORY_ID;
                $list[$i->ID]['USER_ID'] = $i->USER_ID;
                $list[$i->ID]['DATE'] = $i->DATE;
                $list[$i->ID]['PRICE'] = $i->PRICE;
                $list[$i->ID]['COMMENTS'] = $i->COMMENTS;
            }
        }

        $menu = array(
            'MENU' => Category::menu(),
            "ELEMENTS" => $list
        );

        return view('dashboard')->with('menu', $menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create')->with('menu', ['MENU' => Category::menu()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = Auth::user();
        $task = $request->all();
        Category::create($task);
        return redirect('settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $elements = Items::where('CATEGORY_ID', $id)->orderBy('ID', 'desc')->get();
        $items = [];
        foreach($elements as $element){
            if($element->CATEGORY_ID == $id && $element->USER_ID == Auth::id()){
                $items[$element->ID]['ID'] = $element->ID;
                $items[$element->ID]['CATEGORY_ID'] = $element->CATEGORY_ID;
                $items[$element->ID]['USER_ID'] = $element->USER_ID;
                $items[$element->ID]['DATE'] = $element->DATE;
                $items[$element->ID]['EXPENSE'] = $element->EXPENSE;
                $items[$element->ID]['PRICE'] = $element->PRICE;
                $items[$element->ID]['COMMENTS'] = $element->COMMENTS;
            }
        }

        return view('items.index')->with('menu', [
            "MENU" => Category::menu(),
            "LINK_ID" => $id,
            "ELEMENTS" => $items
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('category.edit')->with('menu', [
            "MENU" => Category::menu(),
            "ITEM" => Category::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $item = Category::find($id);
        $item->id = $request->input('id');
        $item->title = $request->input('title');
        $item->parent_id = $request->input('parent_id');
        $item->class = $request->input('class');
        $item->save();

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id);
        $category->delete();
        return Redirect::back();
    }
}
