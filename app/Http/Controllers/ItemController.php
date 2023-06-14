<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\Item;
//use App\Http\Requests\StoreItemRequest;
//use App\Http\Requests\UpdateItemRequest;
//use Illuminate\Support\Facades\DB;
//
//class ItemController extends Controller
//{
//    /**
//     * Display a listing of the resource.
//     */
//    public function index()
//    {
////        $items = Item::where('id','<',50)->where('price','>',754954)->get();
////        $items = Item::where('price', '<', 900000)
////                ->orWhere('stock', '<', 9)
////                ->get();
//        $items = DB::table('items')->get();
//        return $items;
//        //        return view('stock.index',[
////            'items' => Item::all()
////        ]);
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     */
//    public function create()
//    {
//        return view('stock.create');
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(StoreItemRequest $request)
//    {
//        $item = new Item();
//        $item->name = $request->item_name;
//        $item->price = $request->item_price;
//        $item->stock = $request->item_stock;
//        $item->save();
//        return redirect()->route('stock.index');
//    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show(Item $item)
//    {
//        return view('stock.show', compact('item'));
//
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(Item $item)
//    {
//        return view('stock.edit', compact('item'));
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(UpdateItemRequest $request, Item $item)
//    {
//        $item->name = $request->item_name;
//        $item->price = $request->item_price;
//        $item->stock = $request->item_stock;
//        $item->update();
//        return redirect()->route('stock.index');
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(Item $item)
//    {
//        $item->delete();
//        return redirect()->back();
//    }
//}
