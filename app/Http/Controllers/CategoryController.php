<?php

namespace App\Http\Controllers;

use App\Category,
	App\Items,
	Redirect,
	Auth,
	Illuminate\Http\Request,
	App\Http\Controllers\Controller;

class CategoryController extends Controller
{
	public function main(){
		return Items::all();
	}

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Меню
     */
    public function menu()
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
            'MENU' => $this->menu(),
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
        return view('category.create')->with('menu', ['MENU' => $this->menu()]);
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

        return view('items.index')->with('menu', [
            "MENU" => $this->menu(),
            "LINK_ID" => $id,
            "ELEMENTS" => $element_list
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
            "MENU" => $this->menu(),
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
