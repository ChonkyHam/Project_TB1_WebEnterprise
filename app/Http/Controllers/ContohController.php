<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class ContohController extends Controller
{
        public function TampilContoh()
        {
            $data = [
                'totalProducts' => 330,
                'salesToday' => 150,
                'totalRevenue' => 'Rp. 50,000,000',
                'registeredUsers' => 350
            ];

            return view('index', $data);
        }

        public function ViewHome()
        {
            $produkPerHari = Produk::selectRaw('DATE(created_at) as date, COUNT(*) as total')
                ->groupBy('date')
                ->orderBy('date', 'asc')
                ->get();

            $dates = [];
            $totals = [];

            foreach ($produkPerHari as $item) {
                $dates [] = Carbon::parse($item->date)->format('Y-m-d');
                $totals [] = $item->total;
            }

            // $chart = LarapexChart::barChart()
            // ->setTitle('Produk Ditambhakan Per Hari')
            // ->setSubtitle('Data Penambahan Produk Harian')
            // ->addData('Jumlah Produk', $totals)
            // ->setXAxis($dates);

            $chart = (new LarapexChart)->barChart()
                ->setTitle('Produk Ditambahkan Per Hari')
                ->setSubtitle('Data Penambahan Produk Harian')
                ->addData('Jumlah Produk', $totals)
                ->setXAxis($dates);

            $data = [
                'totalProducts'=> Produk::count(),
                'salesToday' => 130,
                'totalRevenue' => 'RP. 75,000,000',
                'registeredUsers' => 350,
                'chart' => $chart
            ];

            return view('index', $data);

        }
}
