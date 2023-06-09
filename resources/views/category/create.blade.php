@extends("layouts.master")
@section('title')
    Category Create Page
@endsection
@section('content')
    <h3>Category Create</h3>
    <form action="{{ route('category.store') }}" method="POST">
        @csrf()
        <div class="mb-3">
            <label class="form-label" for="name">Category Title</label>
            <input class="form-control" type="text" name="category_title" id="name">
        </div>
        <div class="mb-3">
            <label class="form-label" for="price">Category Description</label>
            <textarea class="form-control" rows="7" name="category_description" id="price"></textarea>
        </div>
        <button class="btn btn-outline-primary">Create Category</button>
    </form>
@endsection

