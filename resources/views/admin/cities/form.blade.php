<div class="row">
    <div class="box">
        <div class="box-body">
            @include('admin.layouts.forms.buttons.form-save')
            <div class="col-sm-8">
                @include('admin.layouts.forms.fields.text',['text_name'=>'name_en','text_value'=>$name_en ?? null,'label_name'=>__("English Name"),'label_req'=>true])
                @include('admin.layouts.forms.fields.text',['text_name'=>'name_ar','text_value'=>$name_ar ?? null,'label_name'=>__("Arabic Name"),'label_req'=>true])
                @include('admin.layouts.forms.fields.number',['number_name'=>'shipping','label_name'=>__("Shipping"),'not_req'=>true])
                @include('admin.layouts.forms.fields.number',['min'=>1,'max'=>127 ,'number_name'=>'order_id','number_value'=>$order_id ?? null,'label_name'=>__("Order No"),'label_req'=>true])
                @include('admin.layouts.forms.fields.select')
            </div>
        </div>
    </div>
</div>

