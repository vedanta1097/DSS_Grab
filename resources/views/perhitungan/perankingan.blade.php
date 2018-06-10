@extends('adminlte::page')

@section('title', 'DSS Grab')

@section('content_header')
    <h1>Perankingan</h1>
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
								<th class="center-table">Total</th>
							</tr>
						</thead>
						<tbody>
							<tr class="alert-warning">
								<th class="col-sm-1 center-table">Bobot</th>
								@foreach($criterias as $criteria)
									<td class="col-sm-1 center-table">{{ $criteria->bobot }}%</td>
								@endforeach
								<td class="col-sm-1 center-table">100%</td>
							</tr>
							@foreach($alternatives as $i => $alt)
							<tr class='{{ ($total[$i] == $max_total) ? "alert-success" : "" }}'>
								<th class="col-sm-1">{{ $alt->nama }}</th>
								@foreach($criterias as $j => $cri)
								<td class="col-sm-1 center-table">{{ $matriks_normalisasi[$j][$i] }}</td>
								@endforeach
								<th class="col-sm-1 center-table text-value">{{ $total[$i] }}</th>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop

