@extends('layouts.master');
@section('title')
    Category Edit Page
@endsection

@section('content')
    <h3>List Edit</h3>
    <form action="{{ route("category.update",$category->id) }}"  method="post">
        @method('PUT')
        @csrf()
        <div class="mb-3">
            <label class="form-label" for="name">Category Title</label>
            <input class="form-control" type="text" value="{{ $category->title }}" name="category_title" id="name">
        </div>
        <div class="mb-3">
            <label class="form-label" for="price">Category Description</label>
            <textarea class="form-control" rows="7"  name="category_description" id="price">{{ $category->description }}</textarea>
        </div>

        <button class="btn btn-outline-primary">Update Category</button>
    </form>
@endsection
