@extends('layouts.layout')
@section('title', 'Edit Siswa')

@section('content')
<div class="container-fluid">
				<h1 class="mt-4">Data Siswa</h1>
				<div class="container">
			@if(session('success'))
					<div class = "alert alert-success">
				{{ session('success') }}
					</div>
				@endif
				@if(session('error'))
					<div class = "alert alert-error">
				{{ session('error') }}
					</div>
				@endif
					<form action="/data-siswa/update/{{ $siswa->nim }}" method="post">
					@csrf
					@method('PUT')
						<div class="form-group row">
							<label for="nim" class="col-sm-2 col-form-label">NIM</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nim" name="nim" value="{{ $siswa->nim  }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-2 col-form-label">Nama</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="kode_jur" class="col-sm-2 col-form-label">Kode Jurusan</label>
							<div class="col-sm-10">
								<select name="kode_jur">
									<option value="">-- Pilih Kode Jurusan --</option>
									@foreach( $jurusan as $s )
										<option value="{{ $s->kode_jur }}">{{ $s->kode_jur }} - {{ $s->nama }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<button type="submit" name="submit" class="badge badge-success">Save</button>
					</form>
				</div>
			</div>
		</div>
    <!-- /#page-content-wrapper -->

  </div>

@endsection