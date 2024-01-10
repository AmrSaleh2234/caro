<div class="row">
    <div class="col-lg-12 margin-tb">
        @include('admin.layouts.page-head')
        @if(isset($route_create) && $route_create == true)
            @include('admin.layouts.tables.add-old',['table'=>'order_rejects','value'=>__('Create Order Reject')])
        @endif
    </div>
</div>
</div>
