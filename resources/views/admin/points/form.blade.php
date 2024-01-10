<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                @if($new > 0)
                @if($user_id > 0)
                {!! Form::hidden('user_id', $user_id) !!}
                @else
                @include('admin.layouts.forms.models.client')
                @endif
                @else
                <label>{{ __('User') }}</label>
                 <br><label>{{ $point->user->name }}</label>
                @endif
                @include('admin.layouts.forms.numbers.point')
                @include('admin.layouts.forms.selects.wallet')
                @include('admin.layouts.forms.buttons.save')
            </div>
        </div>
    </div>
</div>

