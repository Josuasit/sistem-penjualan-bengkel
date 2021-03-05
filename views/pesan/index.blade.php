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
    <li class="breadcrumb-item active" aria-current="page">{{$produk->Nama_Produk}}</li>
  </ol>
</nav>
    </div>
    <div class="col-md-12 mt-2">
      <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <img src="{{url ('uploads')}}/{{ $produk->gambar}}" class="rounded mx-auto d-block" width="90%" alt="">
            </div>
            <div class="col-md-6 mt-5">
               <h4>{{$produk->Nama_Produk}}</h4>
               <table class="table">
                 <tbody>
                   <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td> Rp. {{ ($produk->Harga_Produk)}}</td>
                   </tr>
                   <tr>
                    <td>Stok</td>
                    <td>:</td>
                    <td> {{($produk->Stok_Produk)}}</td>
                   </tr>
                   <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td> {{$produk->Keterangan}}</td>
                   </tr>

                     <tr>
                     <td>Jumlah Pesan</td>
                     <td>:</td>
                     <td>
                       <form method="post" action=" {{url ('pesan')}}/{{$produk ->id}}">
                        @csrf
                       <input type="text" name="jumlah_pesan" class="form-control" required="">
                       <button type="submit" class="btn btn-primary mt-2"> Masukan Keranjang</button>
                   </form>                  
                 </tbody>
               </table>
            </div>
            
          </div>
        </div>
      </div>
    </div>  
   </div>
</div>
@endsection
