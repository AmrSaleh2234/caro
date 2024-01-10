<div class="row">
    <div class="col-lg-12 m-t">
        @include('admin.layouts.page-head')
        @if(isset($route_create) && $route_create == true)
        @include('admin.layouts.tables.add-old',['table'=>'pages','value'=>$create_name ?? __('Create Page'),'create_type'=>'type','type_id' => $type ?? "page"])
        @endif
        {{--  @include('admin.layouts.tables.add',['table'=>'pages','value'=>__('Create Page')])  --}}
    </div>
</div>
</div>
