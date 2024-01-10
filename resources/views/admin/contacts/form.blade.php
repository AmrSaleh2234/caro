<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                        <label>{{ __('Name') }}</label>
                        <label>{{ $contact->user->name }}</label>
                </div>
                <div class="form-group">
                    <label>{{ __('Phone') }}</label>
                    <label>{{ $contact->phone }}</label>
                </div>
                <div class="form-group">
                        <label>{{ __('Title') }}</label>
                        <label>{{ $contact->title }}</label>
                    </div>
                <div class="form-group">
                    <label>{{ __('Message') }}</label>
                    <label>{{ $contact->content }}</label>
                </div>
            </div>
        </div>
    </div>
</div>

