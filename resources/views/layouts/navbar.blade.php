<aside>
    <div class="list-group">
        <a href="{{route('page.home')}}" class="list-group-item list-group-item-action">Home</a>
        @if(!session('auth'))
            <a href="{{route('auth.login')}}" class="list-group-item list-group-item-action">Log in</a>
        @endif
    </div>


    @user
        <h4 class="py-2">Inventory</h4>
        <div class="list-group">
            <a href="{{route('stock.index')}}" class="list-group-item list-group-item-action">Inventory List</a>
            <a href="{{route('stock.create')}}" class="list-group-item list-group-item-action">Inventory Create</a>
        </div>
        <h4 class="py-2">Category</h4>
        <div class="list-group">
            <a href="{{route('category.index')}}" class="list-group-item list-group-item-action">Category List</a>
            <a href="{{route('category.create')}}" class="list-group-item list-group-item-action">Category Create</a>
        </div>
        <form action="{{route('auth.logout')}}" method="post" class="list-group py-2">
            @csrf
            <button class="list-group-item list-group-item-action">Log out</button>
        </form>
    @enduser
</aside>
