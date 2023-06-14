<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Stock;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Stock::when(request()->has('keyword'),function ($query){
        $keyword = request()->keyword;
            $query->where('title','like','%'.$keyword.'%');
            $query->orWhere('price','like','%'.$keyword.'%');
        })
            ->when(request()->name,function ($query){
                $sort = request()->name ;
                $query->orderBy('title',$sort);
            })
            ->paginate(10)->withQueryString();
        return view('stock.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stock.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStockRequest $request)
    {
        $item = new Stock();
        $item->title = $request->item_name;
        $item->price = $request->item_price;
        $item->save();
        return redirect()->route('stock.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        return view('stock.show',compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        return view('stock.edit',compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockRequest $request, Stock $stock)
    {
        $stock->title = $request->item_name;
        $stock->price = $request->item_price;
        $stock->update();
        return redirect()->route('stock.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $stock->delete()    ;
        return redirect()->back();
    }
}
