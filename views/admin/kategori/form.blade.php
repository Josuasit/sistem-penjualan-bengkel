@extends('layout.adminlte')

@section('content')

@php 
	$formTitle = !empty($kategori) ? 'Update' : 'New'
@endphp

<div class="content">
	<div class="row">
		<div class="col-lg-6">
			<div class="card card-default">
				<div class="card-header card-header-border-bottom">
		<h2>{{ $formTitle}} Kategori</h2>
				</div>
	<div class="card-body">
		@include('admin.flash', ['errors' => $errors])
		@if(!empty($kategori))
		{!! Form::model($kategori, ['url' => ['kategori, $kategori->id'], 'method' =>'PUT']) !!}
		{!!Form::hidden('id')!!}
		@else
		{!! Form::open(['url' => 'kategori']) !!}
		@endif
		<div class="form-group">
			{!! Form::label('name', 'Name') !!}
			{!! Form ::text('name', null,['class'=>'form-control', 'placeholder' =>'nama kategori']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('parent_id', "Parent") !!}
			{!! General::selectMultilevel('parent_id', $kategoris,['class' => 'form-control', 'selected' => !empty(old('parent_id')) ? old('parent_id') : !empty($kategori['parent_id']) ? $kategori['parent_id'] : '', 'placeholder' => '--Pilih Kategori--']) !!}
			
		</div>
		<div class="form-footer pt-5 border-top">
			<button type="submit" class="btn btn-primary"> Save </button>	
		</div>	
		{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>	
</div>
@endsection