@php
    $route_name = getRouteName($route_type ?? null);
    $add_class = '';
    $route_method = 'PATCH';
    $is_validate = 'yes';
    $route_validate = 'data-parsley-validate';
    $route_validate_type = 'parsley';
    $autocomplete = 'off';
    $route_status = 'update';
    if (isset($form_class)) {
        $add_class = $form_class;
    }
    if (isset($form_method)) {
        $route_method = $form_method;
    }
    if (isset($form_autocomplete)) {
        $autocomplete = $form_autocomplete;
    }
    if (isset($form_validate)) {
        $is_validate = $form_validate;
    }
    if (isset($form_status)) {
        $route_status = $form_status;
    }
    $form_control = ['method' => $route_method,'class' => 'systemira-form ' . $add_class, 'autocomplete' => $autocomplete];
    if ($is_validate == "yes"){
        $form_control[$route_validate] = $route_validate_type;
    }
    if (isset($enctype)){
        $form_control['enctype'] = "multipart/form-data";
    }
    if (isset($model_id) && isset($table_parent)){
        $form_control['route'] = ["$route_name.$table_parent.$table.$route_status", $model_id, $model->id];
    }elseif (isset($profile)){
        $form_control['route'] = ["$route_name.$table.$route_status"];
    }else{
        $form_control['route'] = ["$route_name.$table.$route_status",$model->id];
    }
@endphp
    {!! Form::model($model,$form_control) !!}
