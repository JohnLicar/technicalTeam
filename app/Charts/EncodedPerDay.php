<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class EncodedPerDay
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
            ->whereDate('created_at', '>=', now()->subDays(7))
            ->select(DB::raw('DATE_FORMAT(created_at, "%M %d, %Y") as created_at'), DB::raw('count(id) as total'))
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'))
            ->pluck('total', 'created_at')->all();

        $data = [];

        foreach ($totalApplicants as $applicant) {
            $data[] = $applicant;
        }

        $xdata = array_keys($totalApplicants);

        return $this->chart->areaChart()
            ->setTitle('Total Number of Encoded per Day')
            ->addData('Applicant Entries', $data)
            ->setXAxis($xdata)
            ->setGrid()
            ->setColors(['#00a9f4', '#303F9F'])
            ->setMarkers(['#00E396', '#E040FB'], 7, 10);
    }
}
