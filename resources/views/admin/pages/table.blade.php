<thead>
    <tr>
        {{--  <th>{{ __('ID') }}</th>  --}}
        <th>{{ __('Name') }}</th>
        <th>{{ __('Title') }}</th>
        <th>{{ __('Image') }}</th>
        @if (isset($type) && $type == 'page')
            <th>{{ __('Page') }}</th>
        @elseif(isset($type) && $type == 'slider')
            <th>{{ __('Product') }}</th>
        @endif
        <th>{{ __('Status') }}</th>
        <th>{{ __('Setting') }}</th>
    </tr>
</thead>
@foreach ($data as $key => $model)
    <tr>
        {{--  <td>{{ $model->id }}</td>  --}}
        <td>{!! $model->name[$admin_language] !!}</td>
        <td>
            @if (isset($model->title))
                {!! $model->title[$admin_language] !!}
            @endif
        </td>

        <td> <img src="{{ $model->image }}" class="table-img"
                @if ($model->image == null) style="display:none;" @endif /></td>
        @if (isset($type) && $type == 'page')
        <td>{{ pageName($model->page_type) }}</td>
        @elseif (isset($type) && $type == 'slider')
            <td>@if(isset($model->product)) {!! optional($model->product)->name[$admin_language] !!}@endif</td>
        @endif
        <td>
            @include('admin.layouts.tables.status', [
                'active' => $model->active,
                'ajax_class' => $model->getTable() . '-status',
                'id' => $model->id,
            ])
        </td>
        <td>
            {{--  @if ($model->deleted_at == null)  --}}
            @include('admin.layouts.tables.edit-old', ['table' => $model->getTable(), 'id' => $model->id])
            {{--  @endif  --}}
        </td>
    </tr>
@endforeach
