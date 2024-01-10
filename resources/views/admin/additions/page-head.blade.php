<div class="row">
    <div class="col-lg-12 margin-tb">
        @include('admin.layouts.page-head')
        @if(isset($route_create) && $route_create == true)
            @include('admin.layouts.tables.add-old',['table'=>'additions','value'=>__('Create Addition')])
        @endif
        {{--  @if( auth()->user()->isAbleTo('additions.delete'))
            @include('admin.layouts.tables.trash',['table'=>'additions'])
        @endif  --}}
    </div>
</div>
</div>
