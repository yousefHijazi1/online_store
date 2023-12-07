<?php

namespace App\Http\Controllers;


use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items= Item::latest()->paginate(5);

        return view('items.index',compact('items'))
                ->with('i',(request()->input('page',1) -1) *5 );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'price'=>'required'
        ]);

        $input =$request->all();

        if($image=$request->file('image')){
            $imageName=date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move('images/', $imageName);

            $input['image']= $imageName;
        }

        Item::create($input); //save the data in the database using model
        return redirect()->route('items.index')
                ->with('add_success','Item Added Successfully ');
    }

    public function show(Item $item)
    {
        return view('items.show',compact('item'));
    }

    public function edit(Item $item)
    {
        return view('items.edit',compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);

        $input =$request->all();

        if($image=$request->file('image')){
            $imageName=date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move('images/', $imageName);

            $input['image']= $imageName;
        }else{
            unset($input['image']);
        }

        $item->update($input);
        return redirect()->route('items.index')
                ->with('update_success','Item Info Updated Successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')
        ->with('delete_success','Item Info Deleted Successfully ');
    }
}
