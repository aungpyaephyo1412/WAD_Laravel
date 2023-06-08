<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class itemController extends Controller
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
        return redirect()->route('inventory.index');
    }
}
