@extends('admin.layouts.app')
@section('title') {{ __('Home') }}
@stop
@section('content')

@include('admin.errors.errors')
@include('admin.errors.alerts')

{!! Form::open(array('route' => 'admin.pages.home.store','method'=>'POST','data-parsley-validate'=>"parsley",'class'=>'systemira-form','autocomplete'=>"off")) !!}
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                @include('admin.layouts.forms.buttons.save')
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.forms.close')
@stop
@section('after_foot')
@include('admin.layouts.tinymce')
@stop

