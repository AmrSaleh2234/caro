<div class="row">
    <div class="col-lg-12 margin-tb">
        @include('admin.layouts.page-head')
        @if(isset($route_create) && $route_create == true)
            @include('admin.layouts.tables.add-old',['table'=>'products','value'=>__('Create Product')])
        @endif
        @if( auth()->user()->isAbleTo('products.delete'))
            @include('admin.layouts.tables.trash',['table'=>'products'])
        @endif
    </div>
</div>
</div>
