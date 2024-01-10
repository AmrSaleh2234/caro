<div class="form-group">
        <label>{{ __('English Branch') }}</label>
        {!! Form::text('branch_en', $branch_en ?? "", array('class' => 'form-control','required'=>'','data-parsley-minlength'=>$minlength ?? '3')) !!}
    </div>
