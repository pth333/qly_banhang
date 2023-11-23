<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="{{ route('home')}}" class="active">Home</a></li>
        @foreach($categoriesLimit as $categoriesItem)
        <li class="dropdown"><a href="#">{{$categoriesItem->name}}<i class="fa fa-angle-down"></i></a>

            @if($categoriesItem->categoryChildren->count())
            <ul role="menu" class="sub-menu">
                @foreach($categoriesItem->categoryChildren as $categoriesItemChildren)
                <li><a href="shop.html">{{$categoriesItemChildren->name}}</a>

                </li>
                @endforeach
            </ul>
            @endif

        </li>
        @endforeach
        <li><a href="404.html">404</a></li>
        <li><a href="contact-us.html">Contact</a></li>
    </ul>
</div>