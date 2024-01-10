@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible alert-disable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i>@foreach ($errors->all() as $error) {{ $error }}<br> @endforeach</h4>
</div>
@endif

@if ($message_success = Session::get('success'))
<div class="alert alert-success alert-dismissible alert-disable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i>{{ $message_success }}</h4>

</div>
@endif

@if ($message_info = Session::get('info'))
<div class="alert alert-info alert-dismissible alert-disable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-info"></i>{{ $message_info }}</h4>

</div>
@endif

@if ($message_warning = Session::get('warning'))
<div class="alert alert-warning alert-dismissible alert-disable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-warning"></i>{{ $message_warning }}</h4>

</div>
@endif

@if ($message_error = Session::get('error'))
<div class="alert alert-danger alert-dismissible alert-disable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i>{{ $message_error }}</h4>
</div>
@endif

