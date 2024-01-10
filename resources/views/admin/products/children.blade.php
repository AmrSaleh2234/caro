<div class="children-repeater">
    <div data-repeater-list="childrens">
        <div class="row">
            <div class="col-sm-4">
                <label>{{ __('Size') }}</label>
            </div>
            <div class="col-sm-4">
                <label>{{ __('Price') }}</label>
            </div>
            <div class="col-sm-4">
                <label>{{ __('Active') }}</label>
            </div>
            <div class="clearfix"></div>
        </div>
        @if ($childrens_count > 0)
            @foreach ($childrens as $key => $v)
                <div data-repeater-item>
                    <div class="row">
                        <div class="col-sm-4">
                            @include('admin.layouts.forms.fields.select', ['not_req'=>true,'label_show'=>true,'select_function' => $sizes ?? null,'select_name' => 'size_id','select_value' => $v->size_id])
                        </div>
                        <div class="col-sm-4">
                            @include('admin.layouts.forms.fields.number', ['not_req'=>true,'label_show'=>true,'number_value' => $v->price])
                        </div>
                        <div class="col-sm-4">
                            @include('admin.layouts.forms.fields.select', ['not_req'=>true,'label_show'=>true,'select_value' => $v->active])
                            @include('admin.layouts.forms.fields.hidden', ['hidden' =>'id','hidden_id' => $v->id])
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endforeach
        @else
            <div data-repeater-item>
                <div class="row">
                    <div class="col-sm-4">
                        @include('admin.layouts.forms.fields.select',['not_req'=>true,'label_show'=>true,'select_function' => $sizes ?? null,'select_name' => 'size_id','select_value' => ''])
                    </div>
                    <div class="col-sm-4">
                        @include('admin.layouts.forms.fields.number', ['not_req'=>true,'label_show'=>true,'number_value' => ''])
                    </div>
                    <div class="col-sm-4">
                        @include('admin.layouts.forms.fields.select', ['not_req'=>true,'label_show'=>true,'select_value' => ''])
                        @include('admin.layouts.forms.fields.hidden', ['hidden' =>'id','hidden_id' => 0])

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        @endif
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-4">
                @include('admin.layouts.forms.buttons.add')
            </div>
        </div>
    </div>
</div>
