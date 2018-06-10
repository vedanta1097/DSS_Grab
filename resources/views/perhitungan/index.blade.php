@extends('adminlte::page')

@section('title', 'DSS Grab')

@section('content_header')
    <h1>Data Perhitungan</h1>
@stop

@section('content')
	<div class="box">
		<div class="box-header">
			@include('layouts.error')
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary open-create-modal" data-toggle="modal">
			  Tambah Alternatif
			</button>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th></th>
								<!-- only show criteria that has criteria_id in perhitungan -->
								@foreach($criterias as $no => $criteria)
									@foreach($perhitungans->where('criteria_id',$criteria->id) as $perhitungan)
										<th class="center-table">{{ $criteria->nama }}</th>
										@break
									@endforeach
								@endforeach
								<th class="center-table">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($alternatives as $no => $alt)
							<tr>
								<th class="col-sm-1">{{ $alt->nama }}</th>
								@foreach($alt->perhitungan as $nilai)
								<td class="col-sm-1 center-table">{{ $nilai->crips->nilai }}</td>
								@endforeach
								<td class="col-sm-2 center-table ">
									<button type="button" class="btn btn-warning margin-button open-edit-modal" 
									data-toggle="modal" value="{{ $alt->id }}">
			  							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
									</button>
									<button type="button" class="btn btn-danger margin-button open-delete-modal" 
									data-toggle="modal" value="{{ $alt->id }}">
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
				<div class="col-sm-5">
					<button type="button" class="btn btn-danger open-reset-modal" data-toggle="modal">
					  Reset Alternatif
					</button>
				</div>
				<div class="col-sm-7 pagination-right">
					{{ $alternatives->links() }}
				</div>
			</div>
		</div>
	</div>
	@include('alternative.create')
	@include('alternative.edit')
	@include('alternative.delete')
	@include('alternative.reset')
@stop

