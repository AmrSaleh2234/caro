@if($class == "home" || $class == "order")
    <div class="col-sm-6 m-b-lg">
        {!! $order_status->render() !!}
    </div>
    <div class="col-sm-12 m-b-lg">
        {!! $order_chart_hour->render() !!}
    </div>
    <div class="col-sm-12 m-b-lg">
        {!! $order_chart->render() !!}
    </div>
    <div class="col-sm-12 m-b-lg">
        {!! $order_chart_month->render() !!}
    </div>
    <div class="col-sm-12 m-b-lg">
        {!! $order_chart_year->render() !!}
    </div>
    <div class="col-sm-12 m-b-lg">
        {!! $order_total_chart_hour->render() !!}
    </div>
    <div class="col-sm-12 m-b-lg">
        {!! $order_total_chart->render() !!}
    </div>
    <div class="col-sm-12 m-b-lg">
        {!! $order_total_chart_month->render() !!}
    </div>
    <div class="col-sm-12 m-b-lg">
        {!! $order_total_chart_year->render() !!}
    </div>
@endif
