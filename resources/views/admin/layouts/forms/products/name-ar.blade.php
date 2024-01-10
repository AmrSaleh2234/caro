<div class="form-group">
        <label>{{ __('Arabic Name') }}</label>
        {!! Form::text('name_ar', $name_ar ?? "", array('class' => 'form-control','required'=>'','data-parsley-minlength'=>$minlength ?? '3')) !!}
    </div>
