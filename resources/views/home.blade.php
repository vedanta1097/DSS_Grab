@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="home-title">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</h1>
@stop

@section('content')
	<div class="container" style="margin-top: 1em;">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<p class="home-text text-justify">Sistem Pendukung Keputusan dengan metode Simple Additive Weighting
				untuk menentukan mitra terbaik pada PT. Solusi Transportasi Indonesia (GRAB)</p>
				<p class="home-text text-justify">Konsep dasar metode Simple Additive Weighting adalah mencari penjumlahan terbobot dari rating kinerja pada setiap alternatif pada semua atribut (Fishburn, 1967) (MacCrimmon, 1968).</p>
				<p class="home-text text-justify">Metode ini membutuhkan proses normalisasi matriks keputusan kedalam skala yang dapat diperbandingkan dengan semua rating alternatif yang ada. Skor total untuk alternatif diperoleh dengan menjumlahkan seluruh hasil perkalian antara rating dan bobot tiap atribut.</p>
			</div>
		</div>
	</div>
@stop