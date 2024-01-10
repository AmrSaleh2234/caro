<div class="row">
    <div class="col-lg-12 margin-tb">
        @include('admin.layouts.page-head')
        @if(isset($route_create) && $route_create == true)
            @include('admin.layouts.tables.add-old',['table'=>'users','value'=>__('Create User'),'create_type'=>'type','type_id'=>$type ?? 'client'])
        @endif

        @if( auth()->user()->isAbleTo('users.delete'))
            @include('admin.layouts.tables.trash',['table'=>'users'])
        @endif
    </div>
</div>
</div>
