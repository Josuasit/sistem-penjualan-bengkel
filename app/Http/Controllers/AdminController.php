<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;


class AdminController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
		$produk  = DB::table('produks')->get();
		return view('admin.index',['produks' => $produk]);
    }
    public function tambah()
    {
    	return view('admin.tambah');
    }

    public function store(Request $request)
	{
	DB::table('produks')->insert([
		'id' => $request->id,
		'Nama_Produk' => $request->Nama_Produk,
		'Harga_Produk' => $request->Harga_Produk,
		'Stok_Produk' => $request->Stok_Produk,
		'gambar' => $request->gambar,
		'Keterangan' => $request->Keterangan
]);
		 if($request->hasFile('image')){
            $resorce       = $request->file('image');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() ."/projectjosua/public/uploads", $name);
            $save = DB::table('produks')->insert(['gambar' => $name]);
            echo "Gambar berhasil di upload";
        }else{
            echo "Gagal upload gambar";
        }
	
	alert()->success('Berhasil','Berhasil Ditambahkan.');
	return redirect('admin');
 
	}

	public function hapus($id)
	{
		DB::table('produks')->where('id',$id)->delete();

		alert()->Error('Berhasil','Berhasil Dihapus.');
		return redirect('admin');
	}

	public function edit($id)
	{

		$produk = DB::table('produks')->where('id',$id)->get();
		return view('admin.tambah',['produks' => $produk]);
 
	}

	public function update(Request $request)
	{
	DB::table('produks')->where('id',$request->id)->update([
		'id' => $request->id,
		'Nama_Produk' => $request->Nama_Produk,
		'Harga_Produk' => $request->Harga_Produk,
		'Stok_Produk' => $request->Stok_Produk,
		'gambar' => $request->gambar,
		'Keterangan' => $request->Keterangan

	]);
	
	return redirect('admin');
	}
	  public function upload()
    {
        return view('uploadimage');
    }

}
