<div class="row">
    <div class="col-lg-12 margin-tb">
        @include('admin.layouts.page-head')
        @if(isset($route_create) && $route_create == true)
            @include('admin.layouts.tables.add-old',['table'=>'categories','value'=>__('Create Category')])
        @endif
        @if(auth()->user()->isAbleTo('categories.delete'))
            @include('admin.layouts.tables.trash',['table'=>'categories'])
        @endif
    </div>
</div>
</div>
