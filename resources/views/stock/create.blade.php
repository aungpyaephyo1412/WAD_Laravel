@extends("layouts.master")
@section('title')
    Inventory Create Page
@endsection
@section('content')
    <h3>List Create</h3>
    <form action="{{ route('stock.store') }}" method="POST">
        @csrf()
        <div class="mb-3">
            <label class="form-label" for="name">Item Name</label>
            <input class="form-control @error('item_name') is-invalid @enderror" value="{{ old('item_name')}}" type="text"
                   name="item_name" id="name">
            @error('item_name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="price">Item Price</label>
            <input class="form-control @error('item_price') is-invalid @enderror" value="{{ old('item_price')}}" type="number"
                   name="item_price" id="price">
            @error('item_price')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
{{--        <div class="mb-3">--}}
{{--            <label class="form-label" for="stock">Item Stock</label>--}}
{{--            <input class="form-control  @error('item_stock') is-invalid @enderror" value="{{ old('item_stock')}}" type="number"--}}
{{--                   name="item_stock" id="stock">--}}
{{--            @error('item_stock')--}}
{{--            <div class="invalid-feedback">--}}
{{--                {{$message}}--}}
{{--            </div>--}}
{{--            @enderror--}}
{{--        </div>--}}
        <button class="btn btn-outline-primary">Create Item</button>
    </form>
@endsection

