<?php

namespace App\Http\Controllers;

use App\Http\Resources\StockResource;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $stocks = Stock::when(request()->has('keyword'),function ($query){
            $keyword = request()->keyword;
            $query->where('title','like','%'.$keyword.'%');
            $query->orWhere('price','like','%'.$keyword.'%');
        })
            ->when(request()->name,function ($query){
                $sort = request()->name ;
                $query->orderBy('title',$sort);
            })
            ->paginate(10)->withQueryString();
//        return response()->json([$stocks]);
        return StockResource::collection($stocks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'title'=>'required',
//            'price'=>'required'
//        ]);
        $validator = \Validator::make($request->all(),[
            'title'=>'required',
            'price'=>'required'
        ]);
        if ($validator->fails()){
            return response()->json($validator->messages(),422);
        }
        $stock = new Stock();
        $stock->title = $request->title;
        $stock->price = $request->price;
        $stock->save();
        return response()->json(['message'=>'stock was created'],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stock = Stock::find($id);
        if (is_null($stock)){
            return response()->json(['message'=>'stock not found'],404);
        }
//        return response()->json($stock);
        return new StockResource($stock);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = \Validator::make($request->all(),[
            'title'=>'required',
            'price'=>'required'
        ]);
        if ($validator->fails()){
            return response()->json($validator->messages(),422);
        }
        $stock = Stock::find($id);
        if (is_null($stock)){
            return response()->json(['message'=>'stock not found'],404);
        }
        $stock->title = $request->title;
        $stock->price = $request->price;
        $stock->update();
        return response()->json(['message'=>'stock was updated'],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stock = Stock::find($id);
        if (is_null($stock)){
            return response()->json(['message'=>'stock not found'],404);
        }
        $stock->delete();
        return response()->json([],204);
    }
}
