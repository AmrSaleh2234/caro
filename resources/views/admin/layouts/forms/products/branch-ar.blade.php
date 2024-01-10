<div class="form-group">
        <label>{{ __('Arabic Branch') }}</label>
        {!! Form::text('branch_ar', $branch_ar ?? "", array('class' => 'form-control','required'=>'','data-parsley-minlength'=>$minlength ?? '3')) !!}
    </div>
