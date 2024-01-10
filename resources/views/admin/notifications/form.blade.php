<div class="row">
    <div class="box">
        <div class="box-body">
            @include('admin.layouts.forms.buttons.form-save')
            <div class="col-sm-6">
                @include('admin.layouts.forms.fields.text',['text_name'=>'name_en','text_value'=>$name_en ?? null,'label_name'=>__("English Name"),'label_req'=>true])
                @include('admin.layouts.forms.fields.text',['text_name'=>'name_ar','text_value'=>$name_ar ?? null,'label_name'=>__("Arabic Name"),'label_req'=>true])
                @include('admin.layouts.forms.fields.textarea',['text_name'=>'content_en','text_value'=>$content_en ?? null,'label_name'=>__("English Content")])
                @include('admin.layouts.forms.fields.textarea',['text_name'=>'content_ar','text_value'=>$content_ar ?? null,'label_name'=>__("Arabic Content")])
                @if((int) request()->input('user_id') > 0)
                    @include('admin.layouts.forms.fields.hidden', ['hidden' => 'user_id','hidden_id' => (int) request()->input('user_id')])
                @else
                    @include('admin.layouts.forms.fields.select', ['not_req' => true,'label_name' => __('User'),'select_name' => 'user_id','select_value' => request()->input('user_id') ?? null,'select_function' => $users ?? null])
                @endif
            </div>
            <div class="col-sm-6">
                {{--  @include('admin.layouts.forms.fields.select',['label_name'=> __('User Type'),'select_name'=>'type','select_function'=>userTypeNotifi() ?? null])  --}}
                @include('admin.layouts.forms.fields.select',['label_name'=> __('Type'),'select_name'=>'type','select_function'=>notifiType() ?? null])
                @include('admin.layouts.forms.fields.select',['label_name'=> __('Device'),'select_name'=>'device','select_function'=>deviceType("yes") ?? null,'not_req'=>true])
                @include('admin.layouts.forms.fields.image')
            </div>
        </div>
    </div>
</div>


