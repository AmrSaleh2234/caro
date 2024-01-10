<div class="row">
    <div class="col-lg-12 m-t">
        @include('admin.layouts.page-head')
        @if(isset($route_create) && $route_create == true)
            @include('admin.layouts.tables.add-old',['table'=>'notifications','value'=>__('Create Notification')])
        @endif
        </div>
    </div>
</div>
