<div class="form-group">
        <label>{{ __('Arabic Address') }}</label>
        {!! Form::text('address_ar', $address_ar ?? "", array('class' => 'form-control','required'=>'','data-parsley-minlength'=>$minlength ?? '3')) !!}
    </div>
