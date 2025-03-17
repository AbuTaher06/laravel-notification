<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\User;
use DB;

class MonthlyUsersChart
{
    protected $chart;

    /**
     * Constructor Method
     *
     * @return void
     */
    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    } 
    
    /**
     * Build the Chart
     *
     * @return \ArielMejiaDev\LarapexCharts\LarapexPieChart
     */
    public function build()
    {
        // Fetch data for current year
        $users = User::select(
            DB::raw("COUNT(*) as count"), 
            DB::raw("MONTHNAME(created_at) as month_name"),
            DB::raw("MONTH(created_at) as month_number") // Add this for ordering
        )
        ->whereNotNull('created_at')
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("MONTHNAME(created_at), MONTH(created_at)")) // Group by both
        ->orderBy(DB::raw("month_number")) // Order by numeric month
        ->pluck('count', 'month_name');


        // Handle case where no data exists
        if ($users->isEmpty()) {
            return $this->chart->pieChart()
                ->setTitle('New Users - '.date('Y'))
                ->setLabels(['No Data'])
                ->addData([0]);
        }

        // Build and return the chart
        return $this->chart->pieChart()
            ->setTitle('New Users - '.date('Y'))
            ->addData($users->values()->toArray())
            ->setLabels($users->keys()->toArray());
    }
}
