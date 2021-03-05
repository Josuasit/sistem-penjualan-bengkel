 @extends('layouts.app')

@section('content')
<div class="container">
   <div  class="row">
    <div class="col-md-12">
      <a href="{{url('history')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
      
    </div>
    <div class="col-md-12 mt-2">
      <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{url('history')}}">Riwayat Pemesanan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
  </ol>
</nav>
    </div>
   <div class="col-md-12">
    <div class="card-body">
      <h3>Suskses Check Out</h3>
      <h5>Pesanan Anda Sudah Berhasil di Check Out. Silahkan Lakukan Pembayaran Sebesar : <strong> Rp.{{($order->Jumlah_Harga) }} .000</strong>
      </h5>
    </div>
      <div class="card mt-2">
        <div class="card-header"> 
         <h3> <i class="fa fa-shopping-cart"> </i> Detail Pemesanan</h3> 
         @if(!empty($order))
         <p align="right">Tanggal Pesan : {{$order->Tanggal_Order}}</p>
        </div>
        <div class="card-body">
           <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
           @foreach($order_details as $order_detail)
          <tr>
            <td>{{ $no++}}</td>
            <td>{{$order_detail->Produk->Nama_Produk}}</td>
            <td>{{$order_detail->Jumlah}} item</td>
            <td> Rp. {{($order_detail->Produk->Harga_Produk)}}</td>
            <td> Rp. {{($order_detail->Jumlah_Harga)}} .000</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="4" align="right"> <strong> Total Harga :</strong> </td>
            <td>Rp.{{($order->Jumlah_Harga) }}.000</td>
          </tr>
          
        </tbody>
      </table>
      @endif
        </div>
        
      </div>
    </div>   
   </div>
</div>
@endsection
 