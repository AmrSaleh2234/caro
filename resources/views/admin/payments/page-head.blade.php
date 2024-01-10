<div class="row">
    <div class="col-lg-12 margin-tb">
        @include('admin.layouts.page-head')
        @if(isset($route_create) && $route_create == true)
            @include('admin.layouts.tables.add-old',['table'=>'payments','value'=>__('Create Payment')])
        @endif
    </div>
</div>
</div>
