<div class="form-group">
        <label>{{ __('English Name') }}</label>
        {!! Form::text('name_en', $name_en ?? "", array('class' => 'form-control','required'=>'','data-parsley-minlength'=>$minlength ?? '3')) !!}
    </div>
