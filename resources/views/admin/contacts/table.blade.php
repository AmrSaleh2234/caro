<thead>
    <tr>
        {{--  <th>{{ __('ID') }}</th>  --}}
        <th>{{ __('Name') }}</th>
        <th>{{ __('Phone') }}</th>
        <th>{{ __('title') }}</th>
        <th>{{ __('Message') }}</th>
        {{--  <th>{{ __('Attachment ') }}</th>  --}}
        <th>{{ __('Date') }}</th>
        <th>{{ __('Read') }}</th>
        <th>{{ __('Setting') }}</th>
    </tr>
</thead>
@foreach ($data as $key => $model)
<tr>

    <td>{{ $model->user->name }}</td>
    <td>{!! $model->phone !!}</td>
    <td>{!! $model->title !!}</td>
    <td>{!! str_limit($model->content, 50)  !!}</td>
    {{--  <td>{!! $model->attachment   !!}</td>  --}}
    <td>{{ $model->created_at->diffForHumans() }} </td>
    {{--  <td>{{  date('Y-m-d',strtotime($model->created_at)) }} </td>  --}}
    <td>
        @include('admin.layouts.tables.status',['is_read'=>true,'active'=>$model->is_read,'ajax_class'=>$model->getTable().'-read','id'=>$model->id])
    </td>
    <td>
       @include('admin.layouts.tables.create',['table'=>'notifications','id'=>$model->user_id,'type'=>'user_id','fa_class'=>'bell'])
       @include('admin.layouts.tables.show-old',['table'=>$model->getTable(),'id'=>$model->id])
       {{--  @include('admin.layouts.tables.delete-form-old',['table'=>$model->getTable(),'id'=>$model->id])  --}}
    </td>
</tr>
@endforeach
