@extends('adminlte::page')

@section('title', 'DSS Grab')

@section('content_header')
    <h1>Data Matriks Normalisasi</h1>
@stop

@section('content')
	<div class="box">
		<div class="box-body">
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th></th>
								@foreach($criterias as $criteria)
									<th class="center-table">{{ $criteria->nama }}</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							@foreach($alternatives as $i => $alt)
							<tr>
								<th class="col-sm-1">{{ $alt->nama }}</th>
								@foreach($criterias as $j => $cri)
								<td class="col-sm-1 center-table">{{ $matriks_normalisasi[$j][$i] }}</td>
								@endforeach
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop

