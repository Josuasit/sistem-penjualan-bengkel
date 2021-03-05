@extends('layout.adminlte')

@section('content')
 <section class="content">
      <a href="tambah-produk"><i class="fa fa-plus"> Tambah Produk Baru</i> </a> 
  <table class="table table-striped">
    <tr>
      <th>id</th>
      <th>Nama Produk</th>
      <th>Harga Produk</th>
      <th>Stok Produk</th>
      <th>gambar</th>
      <th>Keterangan</th>
      <th>Aksi</th>

    </tr>
    @foreach($produks as $p)
    <tr>
      <td>{{ $p->id }}</td>
      <td>{{ $p->Nama_Produk }}</td>
      <td>{{ $p->Harga_Produk }}</td>
      <td>{{ $p->Stok_Produk }}</td>
      <td> <img src="{{url('uploads')}}/{{ $p->gambar }}" width="50"></td>
      <td>{{ $p->Keterangan }}</td>

      <td>
        <a href="edit/{{ $p->id }}" class="btn btn-primary btn-sm">Edit</a>
        <a href="hapus/{{ $p->id }}" class="btn btn-danger btn-sm"  ><i class="fa fa-trash"> Hapus </i> </a>
      </td>
    </tr>
    @endforeach
  </table>
  
</div>
@endsection