@extends("layouts.master")
@section('title')
    Item Detail Page
@endsection
@section('content')
<table class="table table-info">
    <tr>
        <td>Name</td>
        <td>{{ $item->name }}</td>
    </tr>
    <tr>
        <td>Price</td>
        <td>{{ $item->price }}</td>
    </tr>
    <tr>
        <td>Stock</td>
        <td>{{ $item->stock }}</td>
    </tr>
    <tr>
        <td>Created_at</td>
        <td>{{ $item->created_at }}</td>
    </tr>
</table>
@endsection

