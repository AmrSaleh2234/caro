<div class=" image-repeater">
    <div  data-repeater-list="all_image" >
        <div class="row">
        <div class="col-sm-12">
            <label>{{ __('Images') }}</label>
        </div>
        </div>
        @if($image_count > 0)
        @foreach($images as $key => $v)
        <div  data-repeater-item>
            <div class="row">
            <div class="col-sm-12" >
                <div class="form-group">
                    <input id="image_link_{{ $key }}" name="image_link" type="hidden" value="{{ $v->image }}">
                    <img src="{{ $v->image }}"  width="50%" height="auto" />
                    <a href="{{URL::asset('filemanager/dialog.php?type=1&akey=admin_panel&field_id=image_link_'.$key)}}" class="btn iframe-btn btn-primary fa fa-upload" type="button"> <span>{{ __('Upload') }}</span></a>
                    <a href="#" class="btn btn-danger fa fa-trash  remove_image_link" type="button"> <span>{{ __('Delete') }}</span></a>
                    <input  class="image_number" type="hidden" value="{{ ++$key }}">
                </div>
            </div>
            </div>
            <div class="clearfix"></div>
        </div>
        @endforeach
        @else
        <div  data-repeater-item>
            <div class="row">
            <div class="col-sm-12" >
                <div class="form-group">
                    <input id="image_link_0" name="image_link" type="hidden" value="">
                    <img  src=""  width="50%" height="auto" style="display:none;" />
                    <a href="{{URL::asset('filemanager/dialog.php?type=1&akey=admin_panel&field_id=image_link_0')}}" class="btn iframe-btn btn-primary fa fa-upload" type="button"> <span>{{ __('Upload') }}</span></a>
                    <a href="#" class="btn btn-danger fa fa-trash  remove_image_link" type="button"> <span>{{ __('Delete') }}</span></a>
                    <input  class="image_number" type="hidden" value="1">
                </div>
            </div>
            </div>
            <div class="clearfix"></div>
        </div>
        @endif
    </div>
    @include('admin.layouts.repeater_add')
</div>
