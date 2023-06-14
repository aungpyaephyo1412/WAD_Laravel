@extends("layouts.master")
@section('title')
    Inventory List Page
@endsection
@section('content')
    <div class="overflow-scroll w-100">
        <div class="row">
            <div class="col-12">
                <p>Stock </p>
            </div>
            <div class="col-3">
                <a href="{{route('stock.create')}}" class="btn btn-outline-primary">Create</a>
            </div>
            <form action="" method="GET" class="col-6">
                <div class="input-group mb-2 position-relative">
                    <input type="text" class="form-control" name="keyword"
                           value="@if(request()->has('keyword')) {{request()->keyword}} @endif">
                    @if(request()->has('keyword'))
                        <a href="{{route('stock.index')}}" class="position-absolute btn" style="right: 85px ;z-index: 5"> X </a>
                    @endif
                    <button class="btn btn-secondary">Search</button>
                </div>
            </form>
            <div class="col-3">
                <div class="">
                        <a href="{{route('stock.index',['name'=>'desc'])}}">Z to A</a>

                        <a href="{{route('stock.index')}}?name=asc">A to Z</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>Id</td>
                <td>Stock Name</td>
                <td>Stock Price</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <div class="w-100 btn-group">
                            <a href="{{ route('stock.show',$item->id) }}"
                               class="btn btn-outline-info w-100 mb-2">Detail</a>
                            <a href="{{ route('stock.edit',$item->id) }}" class="btn btn-outline-secondary w-100 mb-2">Edit</a>
                        </div>
                        <form action="{{ route('stock.destroy',$item->id )}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger w-100">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <td colspan="4">
                    There is no items <br>
                    <a class="btn btn-outline-primary my-2" href="{{ route('stock.create') }}">Create Items</a>
                </td>
            @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">
                        {{$items->onEachSide(1)->links()}}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

