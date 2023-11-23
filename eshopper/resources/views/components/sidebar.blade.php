<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        @foreach($categories as $category)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    @if(count($category->categoryChildren)>0)
                    <a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{$category->id}}">
                        <span class="badge pull-right">

                            <i class="fa fa-plus"></i>

                        </span>
                        {{ $category->name}}

                    </a>
                    @else
                    <a href="#">
                        {{ $category->name}}
                    </a>
                    @endif
                </h4>
            </div>
            <div id="sportswear_{{$category->id}}" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul>
                        @foreach($category->categoryChildren as $categoryChildren)
                        <li><a href="{{ route('category.product',['slug' => $categoryChildren->slug, 'id' => $categoryChildren->id])}}">{{$categoryChildren->name}} </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach


    </div><!--/category-products-->

</div>