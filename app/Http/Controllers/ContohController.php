<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
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

        // Query for products added per day
        $produkPerHariQuery = Produk::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc');

        if (!$isAdmin) {
            $produkPerHariQuery->where('user_id', Auth::id());
        }

        $produkPerHari = $produkPerHariQuery->get();
        $dates = [];
        $totals = [];

        foreach ($produkPerHari as $item) {
            $dates[] = Carbon::parse($item->date)->format('Y-m-d');
            $totals[] = $item->total;
        }

        // Create the chart with LarapexChart
        $chart = LarapexChart::barChart()
            ->setTitle('Produk Ditambahkan Per Hari')
            ->setSubtitle('Data Penambahan Produk Harian')
            ->addData('Jumlah Produk', $totals)
            ->setXAxis($dates);

        // Total Products Query
        $totalProductsQuery = Produk::query();

        if (!$isAdmin) {
            $totalProductsQuery->where('user_id', Auth::id());
        }

        $totalProducts = $totalProductsQuery->count();

        $data = [
            'totalProducts' => $totalProductsQuery->count(),
            'salesToday' => 130,
            'totalRevenue' => 'Rp. 75,000,000',
            'registeredUsers' => 350,
            'chart' => $chart
        ];

        return view('index', $data);
    }
}
