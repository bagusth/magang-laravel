@extends('layouts.layout')
@section('title', 'Data Tagihan')
@section('content')

<style type="text/css">
		.pagination li{
			float: right;
			list-style-type: none;
			margin:5px;
		}
	</style>

<div class="container-fluid">
				<h1 class="mt-4">Data Tagihan</h1>
				<a class="btn btn-success" href="{{ url('/data-tagihan/tambah-tagihan') }}">Tambah Data</a>
				<div class="nav justify-content-end">
					<label>Search:
						<form action="" method="post">
							<input type="text" class="form-control form-control-sm" placeholder="" name="keyword" id="keyword">
						</form>
					</label>
				</div>
				<div id="container">
				<table id="dtBasicExample" class="table table-striped table-bordered autoWidth" cellspacing="0" width="100%">
					<thead class="thead-dark">
						<tr>
							<th class="th-sm">No Tagihan</th>
							<th class="th-sm">NIM</th>
							<th class="th-sm">Tanggal</th>
							<th class="th-sm">Keterangan</th>
							<th class="th-sm">Aksi</th>
						</tr>
					</thead>
					@foreach( $tagihan as $t)
					<tbody>
						<tr>
							<td>{{ $t->no_tagihan }}</td>
							<td>{{ $t->nim }}</td>
							<td>{{ $t->tanggal }}</td>
							<td>{{ $t->keterangan }}</td>
							<td>
								<a class="badge badge-warning" name="submit" href="/data-tagihan/edit-tagihan/{{ $t->no_tagihan}}">Change</a>
								@csrf
								@method('DELETE')
								<a class="badge badge-danger" href="/data-tagihan/delete/{{ $t->no_tagihan}}">Delete</a>
							</td>
						</tr>
					</tbody>
					@endforeach
					<tfoot>
						<tr>
							<th class="th-sm">No Tagihan</th>
							<th class="th-sm">NIM</th>
							<th class="th-sm">Tanggal</th>
							<th class="th-sm">Keterangan</th>
							<th class="th-sm">Aksi</th>
						</tr>
					</tfoot>
				</table>
						{{ $tagihan->links() }}
				</div>
			</div>
		</div>
    <!-- /#page-content-wrapper -->

  </div>

@endsection