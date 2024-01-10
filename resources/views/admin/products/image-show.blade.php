<div class="row">

        @if($image_count > 0)
        <div class="col-sm-12">
            <label>{{ __('Images') }}</label>
        </div>
        @foreach($images as $key => $v)
            <div class="col-sm-12" >
                <div class="form-group">
                    <img src="{{ $v->image }}"  width="90%" height="auto" />
                </div>
            </div>
            <div class="clearfix"></div>
        @endforeach
        @endif
</div>
