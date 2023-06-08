@extends("layouts.master")
@section('title')
    Inventory List Page
@endsection
@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <td>Id</td>
            <td>Item Name</td>
            <td>Item Price</td>
            <td>Item Stock</td>
            <td>Created_at</td>
        </tr>
        </thead>
        <tbody>
        @forelse($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->stock }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
        @empty
            <td colspan="5">
                There is no items <br>
                <a class="btn btn-outline-primary my-2" href="{{ route('inventory.create') }}">Create Items</a>
            </td>
        @endforelse
    </tbody>
</table>
@endsection

