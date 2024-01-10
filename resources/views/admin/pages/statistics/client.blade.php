@if($class == "home" || $class == "client")

    <div class="col-sm-12 m-b-lg">
        {!! $client_chart_hour->render() !!}
    </div>
    <div class="col-sm-12 m-b-lg">
        {!! $client_chart->render() !!}
    </div>
    <div class="col-sm-12 m-b-lg">
        {!! $client_chart_month->render() !!}
    </div>
    <div class="col-sm-12 m-b-lg">
        {!! $client_chart_year->render() !!}
    </div>
@endif
