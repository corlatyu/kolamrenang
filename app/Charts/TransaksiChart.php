<?php

namespace App\Charts;

use App\Models\Ticket;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TransaksiChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $statuses = Ticket::select('status')
            ->groupBy('status')
            ->get()
            ->pluck('status');

        $jumlahPerStatus = [];
        foreach ($statuses as $status) {
            $jumlahPerStatus[$status] = Ticket::where('status', $status)->count();
        }

        return $this->chart->pieChart()
            ->setLabels($statuses->toArray())
            ->addData(array_values($jumlahPerStatus))
            ->setColors(['#4CAF50', '#FFC107', '#F44336' , '#6610f2']) // Sesuaikan dengan warna yang diinginkan
            ->setStroke(2);
    }
}
