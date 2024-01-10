<?php
namespace App\Traits;
use Charts;

trait ChartTrait {

    public function chartHour($data,$title = NULL,$label_count = NULL,$column = "created_at",$aggregate_column= "created_at",$aggregate_type = "count",$year = NULL,$month = NULL,$day = NULL,$chart = 'bar',$type = 'highcharts',$responsive = true,$width = 1000 , $height = 500){
        $day = $day ? $day : date('d');
        $month = $month ? $month : date('m');
        $year = $year ? $year : date('Y');
        return Charts::database($data, $chart, $type)->dateColumn($column)->aggregateColumn($aggregate_column, $aggregate_type)
            ->title($title)->elementLabel($label_count)->dimensions($width, $height)->responsive($responsive)->groupByHour($day, $month, $year, true);
    }

    public function chartDay($data,$title = NULL,$label_count = NULL,$column = "created_at",$aggregate_column= "created_at",$aggregate_type = "count",$chart = 'bar',$type = 'highcharts',$year = NULL,$month = NULL,$responsive = true,$width = 1000 , $height = 500){
        $month = $month ? $month : date('m');
        $year = $year ? $year : date('Y');
        return Charts::database($data, $chart, $type)->dateColumn($column)->aggregateColumn($aggregate_column, $aggregate_type)
            ->title($title)->elementLabel($label_count)->dimensions($width, $height)->responsive($responsive)->groupByDay($month, $year, true);
    }

    public function chartMonth($data,$title = NULL,$label_count = NULL,$column = "created_at",$aggregate_column= "created_at",$aggregate_type = "count",$chart = 'bar',$type = 'highcharts',$year = NULL,$responsive = true,$width = 1000 , $height = 500){
        $year = $year ? $year : date('Y');
        return Charts::database($data, $chart, $type)->dateColumn($column)->aggregateColumn($aggregate_column, $aggregate_type)
        ->title($title)->elementLabel($label_count)->dimensions($width, $height)->responsive($responsive)->groupByMonth($year, true);
    }

    public function chartYear($data,$title = NULL,$label_count = NULL,$column = "created_at",$aggregate_column= "created_at",$aggregate_type = "count",$chart = 'bar',$type = 'highcharts',$year = 4,$responsive = true,$width = 1000 , $height = 500){
        return Charts::database($data, $chart, $type)->dateColumn($column)->aggregateColumn($aggregate_column, $aggregate_type)
        ->title($title)->elementLabel($label_count)->dimensions($width, $height)->responsive($responsive)->groupByYear($year, true);
    }

    public function chartLastYears($data,$title = NULL,$label_count = NULL,$column = "created_at",$aggregate_column= "created_at",$aggregate_type = "count",$chart = 'bar',$type = 'highcharts',$year = 4,$responsive = true,$width = 1000 , $height = 500){
        return Charts::database($data, $chart, $type)->dateColumn($column)->aggregateColumn($aggregate_column, $aggregate_type)
        ->title($title)->elementLabel($label_count)->dimensions($width, $height)->responsive($responsive)->lastByYear($year, true);
    }

    public function chartLastMonths($data,$title = NULL,$label_count = NULL,$column = "created_at",$aggregate_column= "created_at",$aggregate_type = "count",$chart = 'bar',$type = 'highcharts',$month = 6,$responsive = true,$width = 1000 , $height = 500){
        return Charts::database($data, $chart, $type)->dateColumn($column)->aggregateColumn($aggregate_column, $aggregate_type)
        ->title($title)->elementLabel($label_count)->dimensions($width, $height)->responsive($responsive)->lastByMonth($month, true);
    }

    public function chartLastDays($data,$title = NULL,$label_count = NULL,$column = "created_at",$aggregate_column= "created_at",$aggregate_type = "count",$chart = 'bar',$type = 'highcharts',$day = 7,$responsive = true,$width = 1000 , $height = 500){
        return Charts::database($data, $chart, $type)->dateColumn($column)->aggregateColumn($aggregate_column, $aggregate_type)
        ->title($title)->elementLabel($label_count)->dimensions($width, $height)->responsive($responsive)->lastByDay($day, true);
    }

    public function chartGroup($data,$title = NULL,$label_count = NULL,$columns = ["status"],$map = [],$chart = 'bar',$type = 'highcharts'){
        return Charts::database($data, $chart, $type)->title($title)->elementLabel($label_count)
        ->dimensions(1000, 500)->responsive(true)->groupBy($columns,null,$map);
    }

    public function chartCreate($labels,$values,$title = NULL,$label = NULL,$chart = 'bar',$type = 'highcharts',$responsive = true,$width = 1000 , $height = 500){
        return Charts::create($chart, $type)->title($title)->elementLabel($label)
        ->labels($labels)->values($values)->dimensions($width, $height)->responsive($responsive);
    }

    public function chartMulti($labels,$values_first,$values_second,$title = NULL,$label = NULL,$label_first = NULL,$label_second = NULL,$colors = ['#d73925', '#f012be'],$chart = 'areaspline',$type = 'highcharts',$responsive = true,$width = 1000 , $height = 500){
     return Charts::multi($chart, $type)->title($title)->elementLabel($label)->colors($colors)
     ->labels($labels)->dataset($label_first,  $values_first)->dataset($label_second, $values_second)->dimensions($width, $height)->responsive($responsive);
    }

}




