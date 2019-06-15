<?php

namespace App\Http\Controllers;

use App\Category,
	App\Items,
	Auth,
	Illuminate\Http\Request,
	Redirect,
    App\Http\Controllers\Controller;

class ItemsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create')->with('menu', ['MENU' => Category::menu()]);
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
        $task['USER_ID'] = $user->id;
        Items::create($task);
        return redirect('/category/'.$request['CATEGORY_ID']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('items.edit')->with('menu', [
            "MENU" => Category::menu(),
            "ITEM" => Items::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Items::find($id);
        $item->DATE = $request->input('DATE');
        $item->CATEGORY_ID = $request->input('CATEGORY_ID');
        $item->PRICE = $request->input('PRICE');
        $item->COMMENTS = $request->input('COMMENTS');
        $item->save();

        return redirect('/category/'.$request->input('CATEGORY_ID'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Items::where('ID', $id);
        $item->delete();
        return Redirect::back();
    }

}
