@extends('layout.adminlte')

@section('content')
 <section class="content">
      <a href="dashboard" class="fa fa-left"> Kembali</a>
  
  <br/>
  <br/>
    @foreach($produks as $p)
  <form action="{{url('update')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $p->id }}"> <br/><br>
    Nama Produk &emsp;<input type="text" required="required" name="Nama_Produk" value="{{ $p->Nama_Produk }}"> <br/><br>
    Harga Produk &emsp;<input type="text" required="required" name="Harga_Produk" value="{{ $p->Harga_Produk }}"> <br/><br>
    Stok Produk&emsp;&emsp;<input type="number" required="required" name="Stok_Produk" value="{{ $p->Stok_Produk }}"> <br/><br>
    gambar &emsp;&emsp; &emsp; <textarea required="required"  name="gambar" value="{{ $p->gambar }}"></textarea> <br/><br>
    Keterangan &emsp;&emsp;<textarea required="required" name="Keterangan">{{ $p->Keterangan }}</textarea><br/>
    <input type="submit" class="col-md-2" value="Simpan Data">
  </form>
  @endforeach

      <!-- Default box -->
      <!-- /.box -->

    </section>
@endsection