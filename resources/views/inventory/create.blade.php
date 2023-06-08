@extends("layouts.master")
@section('title')
    Inventory Create Page
@endsection
@section('content')
<h3>List Create</h3>
<form action="{{ route('inventory.store') }}" method="POST">
    @csrf()
    <div class="mb-3">
        <label class="form-label" for="name">Item Name</label>
        <input class="form-control" type="text" name="item_name" id="name">
    </div>
    <div class="mb-3">
        <label class="form-label" for="price">Item Price</label>
        <input class="form-control" type="number" name="item_price" id="price">
    </div>
    <div class="mb-3">
        <label class="form-label" for="stock">Item Stock</label>
        <input class="form-control" type="number" name="item_stock" id="stock">
    </div>
    <button class="btn btn-outline-primary">Create Item</button>
</form>
@endsection

