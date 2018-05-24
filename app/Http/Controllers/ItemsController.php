<?php

namespace App\Http\Controllers;

use App\Category;
use App\Items;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('items.create')->with('menu', $item);

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
        Items::create([
            'DATE' => $request['DATE'],
            'USER_ID'=> $task['USER_ID'],
            'PRICE' => $request['PRICE'],
            'COMMENTS' => $request['COMMENTS'],
        ]);
        return redirect('/category');

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
    public function edit(Items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Items $items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Items::findOrFail($id);
        $a=$item->delete();
        dump($a);
        //return redirect('/category');
    }

}
