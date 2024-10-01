<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
