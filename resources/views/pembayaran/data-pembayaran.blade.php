@extends('layouts.layout')
@section('title', 'Data Pembayaran')
@section('content')

<style type="text/css">
		.pagination li{
			float: right;
			list-style-type: none;
			margin:5px;
		}
	</style>

<div class="container-fluid">
				<h1 class="mt-4">Data Pembayaran</h1>
				<a class="btn btn-success" href="data-pembayaran/tambah-ambyar">Tambah Data</a>
				<div class="nav justify-content-end">
					<label>Search:
						<form action="" method="post">
							<input type="text" class="form-control form-control-sm" placeholder="" name="keyword" id="keyword">
						</form>
					</label>
				</div>
				<div id="container">
				<table id="dtBasicExample" class="table table-striped table-bordered autoWidth" cellspacing="0" width="100%">
					<thead class= "thead-dark">
						<tr>
							<th class="th-sm">No Pembayaran</th>
							<th class="th-sm">NIM</th>
							<th class="th-sm">Tanggal</th>
							<th class="th-sm">Keterangan</th>
							<th class="th-sm">Periode</th>
							<th class="th-sm">Aksi</th>
						</tr>
					</thead>
					@foreach ( $pembayaran as $p )
					<tbody>
						<tr>
							<td>{{ $p-> no_bayar}}</td>
							<td>{{ $p-> nim }}</td>
							<td>{{ $p-> tanggal }}</td>
							<td>{{ $p-> keterangan }}</td>   
							<td>{{ $p-> periode }}</td>
							<td>
								<a class="badge badge-warning" href="data-pembayaran/edit/{{ $p->nim }}">Change</a>
								@csrf
								@method('DELETE')
								<a class="badge badge-danger" href="/data-pembayaran/delete/<?=$p["nim"]?>">Delete</a>
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
						{{ $pembayaran->links() }}
				</div>
			</div>
		</div>
    <!-- /#page-content-wrapper -->

  </div>

@endsection