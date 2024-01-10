@if($class == "home" || $class == "post")
   {{--  <div class="col-sm-12 m-b-lg">
        {!! $post_chart_year->render() !!}
    </div>
    <div class="col-sm-12 m-b-lg">
        {!! $post_chart_month->render() !!}
    </div>  --}}
    <div class="col-sm-12 m-b-lg">
        {!! $post_chart->render() !!}
    </div>
@endif
