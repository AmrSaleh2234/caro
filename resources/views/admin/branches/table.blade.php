<thead>
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Name') }}</th>
        {{--  <th>{{ __('Region') }}</th>
        <th>{{ __('City') }}</th>  --}}
        <th>{{ __('Address') }}</th>
        <th>{{ __('Location') }}</th>
        <th>{{ __('Status') }}</th>
        <th>{{ __('Setting') }}</th>
    </tr>
</thead>
@foreach ($data as $key => $model)
<tr>
    <td>{{ $model->id }}</td>
    <td>
        {!! $model->name[$admin_language] !!}
    </td>
    {{--  <td><a href="{{ route('admin.branches.index',['region_id'=>$model->region_id]) }}">
        {{ $model->region->name[$admin_language] }}
    </a>
    </td>
    <td><a href="{{ route('admin.branches.index',['city_id'=>$model->city_id]) }}">
            {{ $model->city->name[$admin_language] }}
    </a>
    </td>  --}}
    <td>{!! $model->address[$admin_language] !!}</td>
    <td>  <a class="btn btn-danger fa fa-map-marker" target="_blank" href={{ url("https://www.google.com/maps/@{$model->latitude},{$model->longitude},14z") }} >
    </td>
    <td>
        @include('admin.layouts.tables.status',['active'=>$model->active,'ajax_class'=>$model->getTable().'-status','id'=>$model->id])
    </td>
    <td>
        @include('admin.layouts.tables.edit-old',['table'=>$model->getTable(),'id'=>$model->id])
        {{--  @include('admin.layouts.tables.delete-form-old',['table'=>$model->getTable(),'id'=>$model->id])  --}}
    </td>
</tr>
@endforeach

