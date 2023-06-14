<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;

class ItemController# extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inventory.index',[
            "items"=>Item::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('inventory.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_name'=>'required |min:5 |unique:items,name',
            'item_price'=>'required',
            'item_stock'=>'required'
        ]);
        $item = new Item();
        $item->name = $request->item_name;
        $item->price = $request->item_price;
        $item->stock = $request->item_stock;
        $item->save();
        return redirect()->route('stock.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(item $item)
    {
        return view('inventory.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(item $item)
    {
        return view('inventory.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, item $item)
    {
        $item->name = $request->item_name;
        $item->price = $request->item_price;
        $item->stock = $request->item_stock;
        $item->update();
        return redirect()->route('stock.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(item $item)
    {
        $item->delete();
        return redirect()->back();
    }
}
