 @extends('layouts.app')

@section('content')
<div class="container">
   <div  class="row">
    <div class="col-md-12">
      <a href="{{url('home')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
      
    </div>
    <div class="col-md-12 mt-2">
      <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
  </ol>
</nav>
    </div>
   <div class="col-md-12">
      <div class="card">
        <div class="card-header"> 
         <h3> <i class="fa fa-shopping-cart"> </i> Check Out</h3> 
         @if(!empty($order))
         <p align="right">Tanggal Pesan : {{$order->Tanggal_Order}}</p>
        </div>
        <div class="card-body">
           <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
           @foreach($order_details as $order_detail)
          <tr>
            <td>{{ $no++}}</td>
            <td>
              <img src="{{url ('uploads')}}/{{ $order_detail->produk->gambar}}" width="90" alt="">
            </td>
            <td>{{$order_detail->Produk->Nama_Produk}}</td>
            <td>{{$order_detail->Jumlah}} item</td>
            <td> Rp. {{($order_detail->Produk->Harga_Produk)}}</td>
            <td> Rp. {{($order_detail->Jumlah_Harga)}}.000</td>
            <td>
              <form action="{{url ('check-out')}}/{{ $order_detail->id}}" method="post">
                @csrf
                {{method_field('DELETE') }}
                <button type="submit" class="btn btn-danger btn-sm" onclick= "return confirm('Anda yakin ingin menghapus item ?');"><i class="fa fa-trash"> Hapus</i></button>
                
              </form>
            </td>
          </tr>
          @endforeach
          <tr>
            <td colspan="4" align="right"> <strong> Total Harga :</strong> </td>
            <td>Rp.{{($order->Jumlah_Harga) }}.000</td>
            <td>
              <a href="{{url('konfirmasi-check-out')}}" class="btn btn-success" onclick= "return confirm('Anda yakin ingin check out ?');" >
                <i class="fa fa-shopping-cart"></i> Check Out
              </a>
            </td>
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
 