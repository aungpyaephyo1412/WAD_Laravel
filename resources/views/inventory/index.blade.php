@extends("layouts.master")
@section('title')
    Inventory List Page
@endsection
@section('content')
    <div class="overflow-scroll w-100">
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>Id</td>
                <td>Item Name</td>
                <td>Item Price</td>
                <td>Item Stock</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                        <div class="w-100 btn-group">
                            <a href="{{ route('inventory.show',$item->id) }}" class="btn btn-outline-info w-100 mb-2">Detail</a>
                            <a href="{{ route('inventory.edit',$item->id) }}" class="btn btn-outline-secondary w-100 mb-2">Edit</a>
                        </div>
                        <form action="{{ route('inventory.destroy',$item->id )}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger w-100">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <td colspan="5">
                    There is no items <br>
                    <a class="btn btn-outline-primary my-2" href="{{ route('inventory.create') }}">Create Items</a>
                </td>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection

