<?php

namespace App\Http\Controllers;


use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;


use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function ViewProduk()
    {
        $produk = Produk::all();
        return view('produk', ['produk' => $produk]);
    }
    public function CreateProduk(Request $request)
     {
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'jumlah_produk' => $request->jumlah_produk,
        ]);
        return redirect('/produk');
    }
    public function ViewAddProduk()
    {
        return view('add_produk');
    }

    public function DeleteProduk($kode_produk)
    {
        Produk::where('kode_produk', $kode_produk)->delete();

        return redirect('/produk');
    }

    public function ViewEditProduk($kode_produk)
    {
        $ubahproduk = Produk::where{'kode_produk', $kode_produk)->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'jumlah_produk' => $request->jumlah_produk
        ]);
        return redirect('/produk');
    }

}
