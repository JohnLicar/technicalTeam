<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class DailyValidated
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {

        DB::statement("SET SQL_MODE=''");

        $totalApplicants = DB::table('applicants')
            // ->whereDate('date_of_validation', '>=', now()->subDays(7))
            ->select(DB::raw('DATE_FORMAT(date_of_validation, "%M %d, %Y") as date_of_validation'), DB::raw('count(id) as total'))
            ->groupBy(DB::raw('DATE_FORMAT(date_of_validation, "%Y-%m-%d")'))
            ->pluck('total', 'date_of_validation')->all();

        $data = [];
        foreach ($totalApplicants as $applicant) {
            $data[] = $applicant;
        }

        $xdata = array_keys($totalApplicants);

        return $this->chart->areaChart()
            ->setTitle('Total Number of Validated per Day')
            ->addData('Applicant Entries', $data)
            ->setXAxis($xdata)
            ->setGrid()
            ->setColors(['#2ccdc9', '#303F9F'])
            ->setMarkers(['#0057ff', '#E040FB'], 7, 10);
    }
}
