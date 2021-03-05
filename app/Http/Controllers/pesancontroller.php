<?php

namespace App\Http\Controllers;
use App\Produk;
use App\Order;
use App\Order_Detail;
use Auth;
use Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;

class pesancontroller extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
    	$produk = Produk::where('id', $id)->first();

    	return view('pesan.index', compact('produk'));
    }
    public function pesan(Request $request, $id)
    {
    	$produk = Produk::where('id', $id)->first();
    	$Tanggal_Order = Carbon::now();

    	//validasi apakah stok nya melebihi
    	if($request->jumlah_pesan > $produk->Stok_Produk)
    	{
    		return redirect('pesan/'.$id);
    	}

    	//cek validasi
    	$cek_order = Order::where('User_id', Auth::user()->id)->where('Status_Order',0)->first();

    	//simpan ke databse order
    	if(empty($cek_order))
    	{
	    	$order = new Order;
	    	$order->User_id = Auth::user()->id;
	    	$order->Tanggal_Order = $Tanggal_Order;
	    	$order->Status_Order= 0;
	    	$order->Jumlah_Harga = 0;
	    	$order->save();
    
    	}

    	//simpanan ke database order_detail
    	$order_baru= Order::where('User_id', Auth::user()->id)->where('Status_Order',0)->first();

    	//cek order_detail
    	$cek_order_detail = Order_Detail::where('Produk_id', $produk->id)->where('Order_id', $order_baru->id)->first();
    	if(empty($cek_order_detail))
    	{
    		$order_detail = new Order_Detail;
	    	$order_detail->Produk_id = $produk->id;
	    	$order_detail->Order_id = $order_baru->id;
	    	$order_detail->Jumlah = $request->jumlah_pesan;
	    	$order_detail->Jumlah_Harga =$produk->Harga_Produk*$request->jumlah_pesan;
	    	$order_detail->save();
    	}else
    	{
    		$order_detail = Order_Detail::where('Produk_id', $produk->id)->where('Order_id', $order_baru->id)->first();
    		$order_detail->Jumlah = $order_detail->Jumlah+$request->jumlah_pesan;

    		//harga sekarang
    		$harga_order_detail_baru = $produk->harga*$request->jumlah_pesan;
	    	$order_detail->Jumlah_Harga = $order_detail->Jumlah_Harga+$harga_order_detail_baru;
	    	$order_detail->update();
    	}

    	//jumlah total
    	$order= Order::where('User_id', Auth::user()->id)->where('Status_Order',0)->first();
    	$order->Jumlah_Harga =$order->Jumlah_Harga + $produk->Harga_Produk*$request->jumlah_pesan;
    	$order->update();
    	
    	
        alert()->success('Berhasil','Pesanan Sukses Masuk Keranjang.');
    	return redirect('check-out');

    }
    public function check_out()
    {
        $order_details= null;
        $order = Order::where('User_id', Auth::user()->id)->where('Status_Order', 0)->first();
        if(!empty($order))
        {
        $order_details = Order_Detail::where('Order_id', $order->id)->get(); 

        }

        return view('pesan.check_out', compact('order','order_details'));
    }

    public function delete($id)
    {
        $order_detail = Order_Detail::where('id',$id)->first();

        $order = Order::where('id', $order_detail->Order_id)->first();     
        $order->Jumlah_Harga = $order->Jumlah_Harga-$order_detail->Jumlah_Harga;
        $order->update();


        $order_detail->delete();
        alert()->error('Hapus','Pesanan Sukses Dihapus');
        return redirect('check-out');
    }
    public function konfirmasi()
    {
        $order = Order::where('User_id', Auth::user()->id)->where('Status_Order',0)->first();
        $order_id = $order->id;
        $order->Status_Order =1;
        $order->update();

        $order_details= Order_Detail::where('Order_id', $order_id)->get();
        foreach ($order_details as $order_detail) {
            $produk = Produk::where('id', $order_detail->Produk_id)->first();
            $produk->Stok_Produk = $produk->Stok_Produk-$order_detail->Jumlah;
            $produk->update();
        }

        alert()->success('Berhasil','Pesanan Sukses Di Check Out Silahkan Lanjutkan ke Pembayaran');
        return redirect('history/'.$order_id);
    }

    

}
