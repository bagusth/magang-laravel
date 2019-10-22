@extends('layouts.layout')
@section('title', 'Tambah Pembayaran')
@section('content')

		<div class="container-fluid">
						<h1 class="mt-4">Data Pembayaran</h1>
						<div class="container">
						<form action = "{{ url('store', @$pembayaran->nim) }}" method = "post">
					@csrf
					@if(!empty($pembayaran))
						@method('PATCH')
					@endif
				<input type="hidden" class="form-control" id="kode_lokasi" name="kode_lokasi" value="&nbsp">
				<div class="card-body">
					<div class="form-group">
						<label for="nim" class="col-form-label">NIM</label><br>
						<select name="nim">
							<option value="">-- Pilih NIM --</option>
							@foreach ($siswa as $row)
							<option value="{{ $row->nim }}" {{ @$pembayaran->nim == $row->nim ? 'selected' : ''}}>{{ $row->nim }} - {{ $row->nama }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="tanggal" class="col-form-label">Tanggal</label><br>
						<input type = "date" class = "form-control" name = "tanggal" value = "{{ old('tanggal', @$pembayaran->tanggal) }}"/>
					</div>
					<div class="form-group">
						<label for="keterangan" class="col-form-label">Keterangan</label><br>
						<input type = "text" class = "form-control" name = "keterangan" value = "{{ old('keterangan', @$pembayaran->keterangan) }}"/>
					</div>
					<div class="form-group">
						<label for="periode" class="col-form-label">Periode</label><br>
						<input type = "text" class = "form-control" name = "periode" value = "{{ old('periode', @$pembayaran->periode) }}"/>
					</div>
						<button type="submit" class="btn btn-success" name="submit">Save</button>
				</div>
				</form>
					<table id="dtBasicExample" class="table table-striped table-bordered autoWidth" cellspacing="0" width="100%">
					<thead class= "thead-dark">
						<tr>
							<th class="th-sm">No Tagihan</th>
							<th class="th-sm">Keterangan</th>
							<th class="th-sm">Nilai Tagihan</th>
							<th class="th-sm">Nilai Bayar</th>
							<th class="th-sm">Aksi</th>
						</tr>
					</thead>
				</table>
				</div>
			</div>
		</div>
    <!-- /#page-content-wrapper -->

  </div>

@endsection