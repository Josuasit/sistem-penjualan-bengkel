<?php

namespace App\Http\Controllers;
use App\Produk;
use App\Order;
use App\Order_Detail;
use Auth;
use Alert;
use App\User;

use Illuminate\Http\Request;

class historycontroller extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$orders = Order::where('User_id', Auth::user()->id)->where('Status_Order', '!=', 0)->get();

    	return view('history.index', compact('orders'));
    }
    public function detail($id)
    {
    	
        $order = Order::where('id', $id)->first();
        $order_details = Order_Detail::where('Order_id', $order->id)->get(); 


    	return view('history.detail', compact('order','order_details'));
         
    }

}
