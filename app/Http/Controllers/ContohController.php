<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
// use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


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

            $isAdmin = Auth::user()->role === 'admin';

            $produkPerHariQuery = Produk::selectRaw('DATE(created_at) as date, COUNT(*) as total')
                ->groupBy('date')
                ->orderBy('date', 'asc');
                // ->get();

                if(!$isAdmin){
                    $produkPerHariQuery->where('user_id', Auth::id());
                }

                $produkPerHari = $produkPerHariQuery->get();
            $dates = [];
            $totals = [];

            foreach ($produkPerHari as $item) {
                $dates [] = Carbon::parse($item->date)->format('Y-m-d');
                $totals [] = $item->total;
            }

            $chart = LarapexChart::barChart()
            ->setTitle('Produk Ditambhakan Per Hari')
            ->setSubtitle('Data Penambahan Produk Harian')
            ->addData('Jumlah Produk', $totals)
            ->setXAxis($dates);

            // $chart = (new LarapexChart)->barChart()
            //     ->setTitle('Produk Ditambahkan Per Hari')
            //     ->setSubtitle('Data Penambahan Produk Harian')
            //     ->addData('Jumlah Produk', $totals)
            //     ->setXAxis($dates);

                $totalProductsQuery = Produk::query();

                if(!$isAdmin){
                    $totalProductsQuery->where('user_id', Auth::id());
                }

            $data = [
                'totalProducts'=> $totalProductsQuery::count(),
                'salesToday' => 130,
                'totalRevenue' => 'RP. 75,000,000',
                'registeredUsers' => 350,
                'chart' => $chart
            ];

            return view('index', $data);

        }
}
