<div class="row">
    <div class="col-lg-12 margin-tb">
        @include('admin.layouts.page-head')
        <a class="btn btn-success fa fa-plus" href="{{ route('admin.addresses.create',['city_id'=>request()->input('city_id') ?? null,'user_id'=>request()->input('user_id') ?? null]) }}">{{ __("Create Address") }}</a>
    </div>
</div>
</div>
