@extends("layouts.master")
@section('title')
    Inventory Edit Page
@endsection
@section('content')
    <h3>List Edit</h3>
    <form action="{{ route('stock.update', $stock->id) }}"  method="post">
        @method('PUT')
        @csrf()
        <div class="mb-3">
            <label class="form-label" for="name">Item Name</label>
            <input class="form-control" type="text" value="{{ $stock->title }}" name="item_name" id="name">
        </div>
        <div class="mb-3">
            <label class="form-label" for="price">Item Price</label>
            <input class="form-control" type="number" value="{{ $stock->price }}" name="item_price" id="price">
        </div>
{{--        <div class="mb-3">--}}
{{--            <label class="form-label" for="stock">Item Stock</label>--}}
{{--            <input class="form-control" type="number" value="{{ $stock->stock }}" name="item_stock" id="stock">--}}
{{--        </div>--}}
        <button class="btn btn-outline-primary">Update Item</button>
    </form>
@endsection

