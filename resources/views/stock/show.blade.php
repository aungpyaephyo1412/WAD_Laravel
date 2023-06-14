@extends("layouts.master")
@section('title')
    Item Detail Page
@endsection
@section('content')
<table class="table table-info">
    <tr>
        <td>Name</td>
        <td>{{ $stock->title }}</td>
    </tr>
    <tr>
        <td>Price</td>
        <td>{{ $stock->price }}</td>
    </tr>
{{--    <tr>--}}
{{--        <td>Stock</td>--}}
{{--        <td>{{ $stock->stock }}</td>--}}
{{--    </tr>--}}
    <tr>
        <td>Created_at</td>
        <td>{{ $stock->created_at }}</td>
    </tr>
</table>
@endsection

