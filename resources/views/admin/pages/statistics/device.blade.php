@if($class == "home" || $class == "client")
    <div class="col-sm-6 m-b-lg">
        {!! $device_chart->render() !!}
    </div>
@endif
