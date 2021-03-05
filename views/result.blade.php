@extends('layouts.app')

@section('content')

      <div class="container">
        
      @if(count($result))
      <div ><strong> Data yang anda cari {{$search}}</strong> </div>
      <div class="container">
        <form action="{{route('home.search')}}" method="get">
          <input type="text" name="q" class="form-control" placeholder="search...">
          <button type="submit" class="btn btn-primary"> Cari</button>
          <br><br>
        </form>
      </div>
       @foreach ($result as $produk)
             <div class="col-md-4">
              <div class="card mt-2">
        <img src =" {{url ('uploads')}}/{{ $produk->gambar}}" class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$produk->Nama_Produk}}</h5>
          <p class="card-text">
            <strong>Harga :</strong>Rp. {{($produk->Harga_Produk)}} <br>
            <strong> Stok :</strong> {{$produk->Stok_Produk}} <br>
            <br>
            <strong> Keterangan :</strong> <br>
            {{$produk->Keterangan}}
          </p>
          <a href="{{ url('pesan')}}/{{$produk->id}}" class="btn btn-primary"> <i class="fa fa-shopping-cart"></i>
          Pesan</a>
        </div>
      </div>   
       </div>
       @endforeach
       
       
    </div>
</div>

    @else
    <h1 align="center">Data tidak Ditemukan</h1>
    @endif
      </div>

@endsection