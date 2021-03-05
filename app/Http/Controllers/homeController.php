<?php

namespace App\Http\Controllers;
use App\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produks = Produk::paginate(20);
        return view('home' , compact('produks'));
    }

    public function search(Request $request)
    {
        $search = $request->get('q');
        $result = Produk::where('Nama_Produk','LIKE','%' .$search .'%')->paginate(10);

        return view('result', compact('search','result'));
    }
}
