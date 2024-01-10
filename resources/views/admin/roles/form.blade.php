<div class="row">
    <div class="box">
        <div class="box-body">
            @include('admin.layouts.forms.buttons.form-save')
            <div class="col-sm-12">
                @include('admin.layouts.forms.fields.select',['label_name'=>__("Name"),'select_name'=>"name",'select_function'=>userType("yes")])
                @include('admin.layouts.forms.texts.name',['name'=> __('Display Name'),'name_text'=>'display_name','not_req'=>true])
                @include('admin.layouts.forms.texts.content',['content'=> __('Description'),'content_text'=>'description'])
                @include('admin.layouts.forms.buttons.save')
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-body">
            <div class="col-sm-12">
                @include('admin.layouts.table-head-search', ['datatable' => 'datatable_role'])
                @include('admin.roles.permissions-table', ['data' => $permissions])
                @include('admin.layouts.table-foot')
            </div>
        </div>
    </div>
</div>
<style>
    .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"], .radio input[type="radio"], .radio-inline input[type="radio"] {
        margin-left: 0 !important;
        margin-top: -6px !important;
      }
</style>

