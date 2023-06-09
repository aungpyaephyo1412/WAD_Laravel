@extends("layouts.master")
@section('title')
    Category List Page
@endsection
@section('content')
    <div class="overflow-scroll w-100">
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>Id</td>
                <td>Category Title</td>
                <td>Description</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ Str::limit($category->description,30,"...") }}</td>
                    <td>
                        <div class="w-100 btn-group">
                            <a href="{{ route('category.show',$category->id) }}" class="btn btn-outline-info w-100 mb-2">Detail</a>
                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-outline-secondary w-100 mb-2">Edit</a>
                        </div>
                        <form action="{{ route('category.destroy',$category->id )}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger w-100">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <td colspan="5">
                    There is no items <br>
                    <a class="btn btn-outline-primary my-2" href="{{ route('category.create') }}">Create Items</a>
                </td>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection

