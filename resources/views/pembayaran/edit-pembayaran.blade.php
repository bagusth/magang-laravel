@extends('layouts.layout')
@section('title', 'Edit Pembayaran')
@section('content')

<div class="container-fluid">
				<h1 class="mt-4">Data Pembayaran</h1>
				<div class="container">
					<form action="/data-pembayaran/update/{{ $pembayaran->nim }}" method="post">
					<input type="hidden" class="form-control" id="kode_lokasi" name="kode_lokasi" value="&nbsp">
					@csrf
					@method('PUT')
						<input type="hidden" name="no_bayar" value="{{ $pembayaran->no_bayar }}" />
						<div class="form-group row">
							<label for="nim" class="col-sm-2 col-form-label">NIM</label>
							<div class="col-sm-10">
								<select name="nim">
									<option value="">-- Pilih NIM --</option>
									@foreach( $siswa as $row )
									<option value="{{ $row->nim }}" {{ @$pembayaran->nim == $row->nim ? 'selected' : ''}}>{{ $row->nim }} - {{ $row->nama }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
							<div class="col-sm-10">
								<input type="date" class = "form-control" name="tanggal" value="{{ $pembayaran->tanggal}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $pembayaran->keterangan }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="periode" class="col-sm-2 col-form-label">Periode</label>
							<div class="col-sm-10">
								<input type="text" class = "form-control" name="periode" pattern="[0-9]{4}/[0-9]{2}" placeholder="yyyy/dd" value="{{ $pembayaran->periode }}">
							</div>
						</div>
						<button class="btn btn-primary" name="submit">Submit</button>
					</form>
					<table id="dtBasicExample" class="table table-striped table-bordered autoWidth" cellspacing="0" width="100%">
					<thead class="thead-dark">
						<tr>
							<th class="th-sm">No Tagihan</th>
							<th class="th-sm">Keterangan</th>
							<th class="th-sm">Nilai Tagihan</th>
							<th class="th-sm">Aksi</th>
						</tr>
							 @foreach($data_tagihan as $rows)
						<tbody>
							<tr>
							<form action="/data-pembayaran/storeBayar" method="post">
							@csrf
								<input type="hidden" name="no_bayar" value="{{ $pembayaran->no_bayar }}"/>
								<td>{{ $rows->no_tagihan }}</td>
								<td>{{ $rows->keterangan }}</td>
								<td>{{ $rows->nilai }}</td>
								<input type="hidden" name="nilai" value="{{ $rows->nilai }}"/>
								<td>
									<button class="btn btn-primary" type="submit" name="submit">Bayar</button>
								</td>
							</form>
							</tr>
						</tbody>
							@endforeach
					</thead>
				</table>
				</div>
			</div>
		</div>
    <!-- /#page-content-wrapper -->

  </div>

@endsection