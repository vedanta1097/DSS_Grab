@extends('adminlte::page')

@section('title', 'DSS Grab')

@section('content_header')
    <h1>Criteria</h1>
@stop

@section('content')
	<div class="box">
		<div class="box-header">
			@include('layouts.error')
			<div class="alert alert-warning alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  		<span aria-hidden="true">&times;</span>
				</button>
				<ul>
					<li>Jika Menambah Kriteria, ingat tambahkan Crips pada Kriteria yang baru.</li>
					<li>Edit Alternatif untuk menambahkan Kriteria baru pada Alternatif tersebut.</li>
				</ul>
			</div>
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal">
			  Tambah Criteria
			</button>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th class="center-table">No</th>
								<th>Nama Criteria</th>
								<th class="center-table">Atribut</th>
								<th class="center-table">Bobot</th>
								<th class="center-table">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($criterias as $no => $cri)
							<tr>
								<td class="center-table">{{ $no+1 }}</td>
								<td>{{ $cri->nama }}</td>
								<td class="center-table">{{ $cri->atribut }}</td>
								<td class="center-table">{{ $cri->bobot }}%</td>
								<td class="center-table">
									<button type="button" class="btn btn-warning margin-button open-edit-modal" 
									data-toggle="modal" value="{{ $cri->id }}">
			  							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
									</button>
									<button type="button" class="btn btn-danger margin-button open-delete-modal" 
									data-toggle="modal" value="{{ $cri->id }}">
			  							<i class="fa fa-trash-o" aria-hidden="true"></i>
									</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-11 pagination-right">
					{{ $criterias->links() }}
				</div>
			</div>
		</div>
	</div>
	@include('criteria.create')
	@include('criteria.edit')
	@include('criteria.delete')
@stop

