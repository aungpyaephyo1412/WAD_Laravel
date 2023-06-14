<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class itemControllerBackup extends Controller
{
    public function create(){
        return view('inventory.create');
    }
    public function index(){
//        $items = new Item();
//        $AllItems = $items->all();
//        dd($AllItems);
        return view('inventory.index',[
            "items"=>Item::all()
        ]);
    }
    public function store(Request $request){
        $item = new Item();
        $item->name = $request->item_name;
        $item->price = $request->item_price;
        $item->stock = $request->item_stock;
        $item->save();
        return redirect()->route('stock.index');
    }
    public function show($id){
//        $item = Item::find($id);
//        dd($item);
//        $item = Item::findOrFail($id);
//        return view('stock.show',[
//            "item" => Item::find($id)
//        ]);
//        return view('stock.show',compact("item"));
        return view('inventory.show',["item" => Item::findOrFail($id)]);
    }

    public function edit($id){
        return view('inventory.edit',["item" => Item::findOrFail($id)]);
    }
    public function update($id,Request $request){
        $item= Item::findOrFail($id);
        $item->name = $request->item_name;
        $item->price = $request->item_price;
        $item->stock = $request->item_stock;
        $item->update();
        return redirect()->route('stock.index');
    }
    public function destroy($id){
        $item= Item::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
}
