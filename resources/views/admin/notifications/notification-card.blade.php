@include('admin.layouts.forms.buttons.collapse',['collapse' => __("Notification Info")])

<div class="box-body">
    <div class="col-sm-6">
        <div class="form-group">
            <label> {{ __('Client') }}</label> :
            <label> {{ $notification->notifiable->name }}</label>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label> {{ __('Phone') }}</label> :
            <label> {{ $notification->notifiable->phone }}</label>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label> {{ __('Title') }}</label> :
            <label> {{ $name }}</label>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label> {{ __('Message') }}</label> :
            <label> {{ $content }}</label>
        </div>
    </div>
</div>

@include('admin.layouts.forms.buttons.collapse-foot')

