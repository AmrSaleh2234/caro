{{  $data->appends(request()->except('page'))->links() }}
<div class="clearfix"></div>
@include('admin.layouts.page-head')
{{  __("Count") }} {{ $data->total() }}
</div>

