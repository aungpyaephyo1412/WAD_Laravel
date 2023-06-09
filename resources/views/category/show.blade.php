@extends("layouts.master")
@section('title')
    Category Detail Page
@endsection
@section('content')
    <table class="table table-info">
        <tr>
            <td>Title</td>
            <td>{{ $category->title }}</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>{{ $category->description }}</td>
        </tr>
    </table>
@endsection

