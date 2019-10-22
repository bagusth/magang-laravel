@extends('layouts.layout')
@section('title', 'Tambah Tagihan')
@section('content')
			<div class="container-fluid">
				<h1 class="mt-4"> Data Tagihan </h1>
				<div class="container">
					<form action="{{ url('/data-tagihan/store') }}" method="post">
					@csrf
					<input type="hidden" class="form-control" id="kode_lokasi" name="kode_lokasi" value="&nbsp">
						<div class="form-group row">
							<label for="nim" class="col-sm-2 col-form-label">NIM</label>
							<div class="col-sm-10">
								<select name="nim">
									<option value="">-- Pilih NIM --</option>
									@foreach( $siswa as $row )
									<option value="{{ $row->nim }}">{{ $row->nim }} - {{ $row->nama }}</option>
									@endforeach
								</select>	
							</div>
						</div>
						<div class="form-group row">
							<label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
							<div class="col-sm-10">
								<input type="date" class = "form-control" name="tanggal" placeholder="YYYY/MM/DD" required title="Enter Date Format YYYY/MM/DD"/>
							</div>
						</div>
						<div class="form-group row">
							<label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="keterangan" name="keterangan">
							</div>
						</div>
						<button class="btn btn-primary" name="submit">Tambah</button>
					</form>
					<table id="dtBasicExample" class="table table-striped table-bordered autoWidth" cellspacing="0" width="100%">
					<thead class="thead-dark">
						<tr>
							<th class="th-sm">No</th>
							<th class="th-sm">Kode Jenis Tagihan</th>
							<th class="th-sm">Jenis Tagihan</th>
							<th class="th-sm">Nilai</th>
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