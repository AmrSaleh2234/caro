<div class="form-group">
    <label>{{ $name ?? __('Name') }}</label>
    @if(!isset($not_req))
    {!! Form::text($name_text ?? 'name', $name_value ?? null, array("class" =>  $name_class ?? 'form-control' ,'required'=>'','data-parsley-minlength'=>$minlength ?? '1','data-parsley-type'=>$data_type ?? '')) !!}
    @else
    {!! Form::text($name_text ?? 'name', $name_value ?? null, array("class" =>  $name_class ?? 'form-control' ,'data-parsley-minlength'=>$minlength ?? '1','data-parsley-type'=>$data_type ?? '')) !!}
    @endif
</div>
