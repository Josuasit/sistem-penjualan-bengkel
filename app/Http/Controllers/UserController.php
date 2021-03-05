<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order_Detail;
use App\Produk;
use App\Order;
use Auth;
use Alert;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users  = DB::table('users')->get();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function delete($id)
    {
        DB::table('orders')->where('id',$id)->delete();

        alert()->Error('Berhasil','Berhasil Dihapus.');
        return redirect('users.kelola_pesanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kelola($id)
    
   
    {
       
        $order_details= Order_detail::all();
        $order = Order::where('id', $id)->first();

        if(!empty($order)){

        $order_details = Order_Detail::where('Order_id', $order->id)->get(); 

        }

        return view('users.kelola_pesanan', compact('order','order_details'));     
    
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
