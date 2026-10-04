@extends('admin.layout')
@section('title', 'Laporan')
@section('content')
<div class="page-title"><h1>Laporan & ekspor</h1><p>Unduh data operasional dalam format CSV untuk pengolahan lebih lanjut.</p></div>
<div class="grid-3">@foreach(['users'=>'Pengguna','grades'=>'Nilai akademik','products'=>'Produk BLUD','jobs'=>'Lowongan BKK','applications'=>'Lamaran kerja','ppdb'=>'Pendaftar PPDB'] as $key => $label)<section class="card"><div class="muted">{{ $label }}</div><div style="font:800 28px 'Plus Jakarta Sans';margin:7px 0 16px">{{ number_format($totals[$key]) }}</div><a class="button" href="{{ route('admin.reports.export',['type'=>$key]) }}">Unduh CSV</a></section>@endforeach</div>
@endsection
