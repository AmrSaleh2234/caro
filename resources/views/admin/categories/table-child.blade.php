@foreach ($data as $key => $model)
<tr>
    <td>{{ $model->id }}</td>
    <td>{{ $model->name[$admin_language] }} @if( isset($model->parent))
        - {{ optional($model->parent)->name[$admin_language] }}
        @endif</td>
    <td>{{ $model->order_id }}</td>
    <td>{{ $model->products->count() }}</td>
    <td>
        @include('admin.layouts.tables.status',['active'=>$model->active,'ajax_class'=>$model->getTable().'-status','id'=>$model->id])
    </td>
    <td>
        @if($model->deleted_at == NULL)
        @include('admin.layouts.tables.models',['fa_class'=>'star','table'=>'products','type'=>'category_id','type_value'=>$model->id])
            @include('admin.layouts.tables.edit-old',['table'=>$model->getTable(),'id'=>$model->id])
            @include('admin.layouts.tables.delete-form-old',['table'=>$model->getTable(),'id'=>$model->id])
        @else
        @include('admin.layouts.tables.restore-old',['table'=>$model->getTable(),'id'=>$model->id])
        @endif
    </td>
</tr>
@if ($model->allChildrens && isset($category_type) && $category_type == "all")
    @include('admin.categories.table-child',['data'=>$model->allChildrens])
@endif
@endforeach

