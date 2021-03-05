@extends('layout.adminlte')

@section('content')

 <a href="{{url('admin')}}" class="btn btn-primary" ><i class="fa fa-arrow-left">  Kembali</i></a>
    <section class="content">
       <form action="store" method="post" >
      {{ csrf_field() }}
    Nama Produk:&emsp;   <input type="text" name="Nama_Produk" required="required"> <br/><br>
     Harga Produk:&emsp; <input type="text" name="Harga Produk" required="required"> <br/><br>
    Stok Produk &emsp;&emsp;<input type="number" name="Stok Produk" required="required"> <br/><br>
    Keterangan:&emsp;&emsp; <textarea name="Keterangan" required="required"></textarea> <br/><br>
    gambar&emsp;&emsp;&emsp;&emsp;  <form action="image" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="gambar">
    <button type="submit">Upload File</button>
    </form>
    <input type="submit" class="btn btn-primary col-md-2" value="Simpan Data">
  </form>

      <!-- Default box -->
      <!-- /.box -->

    </section>
@endsection