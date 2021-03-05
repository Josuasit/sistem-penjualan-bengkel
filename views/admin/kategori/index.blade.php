@extends('layout.adminlte')

@section('content')
<div class="content">
	<table class="table table-dark">
						<thead>
							<th>No</th>
							<th>Nama</th>
							<th> Satuan</th>
							<th>Produk Sparepart</th>
							<th>Aksi</th>
						</thead>
						<tbody>
							@forelse($kategoris as $kategori)
							<tr>
								<td>{{$kategori->id}}</td>
								<td>{{$kategori->name}}</td>
								<td>{{$kategori->slug}}</td>
								<td>{{$kategori->parent ? $kategori->parent->name : ''}}</td>
								<td>
       					 <a href="{{url('admin/kategori/'. $kategori->id .'/edit') }}" class="btn btn-warning">Edit</a>

       					 {!! Form::open(['url' =>'admin/kategori'. $kategori->id, 'class'=>'delete', 'style' =>'display :inline-block' ]) !!}
       					 {!! Form::hidden('_method', 'DELETE') !!}
       					 {!! Form::submit('delete', ['class' =>'btn btn-danger']) !!}
       					 {!! Form::close() !!}
							</tr>
							@empty
							<tr>
								<td colspan="5"> No record found</td>
							</tr>
							@endforelse
			</tbody>
						
		</table>
	<div class="card footer text-right">
		<a href="{{url('create')}}" class="btn btn-primary"> Add New</a>
		
	</div>				
			
	
</div>
@endsection