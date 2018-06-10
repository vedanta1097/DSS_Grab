@extends('adminlte::page')

@section('title', 'DSS Grab')

@section('content_header')
    <h1>Crips</h1>
@stop

@section('content')
	<div class="box">
		<div class="box-header">
			@include('layouts.error')
			<!-- Button criteria list -->
			<div class="btn-group">
			  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Pilih Kriteria <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
			  	@foreach($criterias as $cri)
			    <li><a href="/crips/{{ $cri->id }}">{{ $cri->nama }}</a></li>
			    @endforeach
			  </ul>
			</div>
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal">
			  Tambah Crips
			</button>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th class="center-table">No</th>
								<th>Nama Kriteria</th>
								<th>Keterangan</th>
								<th class="center-table">Nilai</th>
								<th class="center-table">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($crips as $no => $crip)
							<tr>
								<td class="center-table">{{ $no+1 }}</td>
								<td>{{ $crip->criteria->nama }}</td>
								<td>{{ $crip->keterangan }}</td>
								<td class="center-table">{{ $crip->nilai }}</td>
								<td class="center-table">
									<button type="button" class="btn btn-warning margin-button open-edit-modal" 
									data-toggle="modal" value="{{ $crip->id }}">
			  							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
									</button>
									<button type="button" class="btn btn-danger margin-button open-delete-modal" 
									data-toggle="modal" value="{{ $crip->id }}">
			  							<i class="fa fa-trash-o" aria-hidden="true"></i>
									</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@include('crips.create')
	@include('crips.edit')
	@include('crips.delete')
@stop

