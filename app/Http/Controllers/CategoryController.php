<?php

namespace App\Http\Controllers;

use App\Category;
use App\Items;
use Redirect;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
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

        $items_el = Items::orderBy('ID', 'desc')->get();
        //$items_el
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
            'MENU'=>$items,
            "LIST"=>$list
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
        $cats = Category::all();
        $item = [];
        foreach($cats as $cat){
            if(isset($cat->parent_id)){
                $item[$cat->parent_id]['CHILD'][$cat->id]['NAME'] = $cat->title;
                $item[$cat->parent_id]['CHILD'][$cat->id]['ID'] = $cat->id;
            }else{
                $item[$cat->id]['NAME'] = $cat->title;
                $item[$cat->id]['ID'] = $cat->id;
                $item[$cat->id]['CLASS'] = $cat->class;
            }
        }
        $menu = ['MENU'=>$item];
        return view('category.create')->with('menu', $menu);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $task = $request->all();
        Category::create([
            'id' => $request['id'],
            'title'=> $request['title'],
            'parent_id' => $request['parent_id'],
            'class' => $request['class'],
        ]);
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
        $cats = Category::all();
        $item = [];
        foreach($cats as $cat){
            if($id == $cat->id)
                $current = $cat->title;
            if(isset($cat->parent_id)){
                $item[$cat->parent_id]['CHILD'][$cat->id]['NAME'] = $cat->title;
                $item[$cat->parent_id]['CHILD'][$cat->id]['ID'] = $cat->id;
            }else{
                $item[$cat->id]['NAME'] = $cat->title;
                $item[$cat->id]['ID'] = $cat->id;
                $item[$cat->id]['CLASS'] = $cat->class;
            }
        }

        $elements = Items::where('CATEGORY_ID', $id)->orderBy('ID', 'desc')->get();
        $element_list = [];
        foreach($elements as $element){
            if($element->CATEGORY_ID == $id && $element->USER_ID == Auth::id()){
                $element_list[$element->ID]['ID'] = $element->ID;
                $element_list[$element->ID]['CATEGORY_ID'] = $element->CATEGORY_ID;
                $element_list[$element->ID]['USER_ID'] = $element->USER_ID;
                $element_list[$element->ID]['DATE'] = $element->DATE;
                $element_list[$element->ID]['EXPENSE'] = $element->EXPENSE;
                $element_list[$element->ID]['PRICE'] = $element->PRICE;
                $element_list[$element->ID]['COMMENTS'] = $element->COMMENTS;
            }
        }
        $menu = array(
            "MENU" => $item,
            "LINK_ID" => $id,
            "CURRENT" =>$current,
            "ELEMENTS" => $element_list
        );
        return view('items.index')->with('menu', $menu);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
                $item[$cat->id]['CLASS'] = $cat->class;
            }
        }
        $edit_item = Category::find($id);
        $menu = array(
            "MENU" => $item,
            "ITEM" => $edit_item
        );
        return view('category.edit')->with('menu', $menu);
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
        $item->DATE = $request->input('id');
        $item->CATEGORY_ID = $request->input('title');
        $item->PRICE = $request->input('parent_id');
        $item->COMMENTS = $request->input('class');
        $item->save();

        return redirect()->back();
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
