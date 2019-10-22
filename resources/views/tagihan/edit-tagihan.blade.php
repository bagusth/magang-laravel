@extends('layouts.layout')
@section('title', 'Edit Data Tagihan')
@section('content')
<div class="container-fluid">
			<h1 class="mt-4">Data Tagihan</h1>
				<div class="container">
					<form action="{{ url('data-tagihan', @$tagihan->no_tagihan) }}" method="post">
					<input type="hidden" class="form-control" id="kode_lokasi" name="kode_lokasi" value="&nbsp">
						@csrf
						@method('PUT')
						<div class="form-group row">
							<label for="nim" class="col-sm-2 col-form-label">NIM</label>
							<div class="col-sm-10">
								<select name="nim">
								<option value="">-- Pilih NIM --</option>
								@foreach ($siswa as $row)
								<option value="{{ $row->nim }}" {{ @$tagihan->nim == $row->nim ? 'selected' : ''}}>{{ $row->nim }} - {{ $row->nama }}</option>
								@endforeach
								</select>
							</div>
						<div class="form-group">
								<label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label><br>
								<input type = "date" class = "form-control" name = "tanggal" value = "{{ old('tanggal', @$tagihan->tanggal) }}"/>
						</div>
						 <div class="form-group">
							<div class="col-sm-10">				
								<label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label><br>
								<input type = "text" class = "form-control" name = "keterangan" value = "{{ old('keterangan', @$tagihan->keterangan) }}"/>
							</div>
						</div>
						</div>
						<a class="btn btn-danger" href="" data-toggle="modal" data-target="#tambahTagihan">
							Tambah Tagihan
						</a>
						<button class="btn btn-primary" name="submit">Save</button>
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
					@if(!empty($tagihan))
					@foreach ($data_tagihan as $row)
					<tbody>
						<tr>
							<td> {{ isset($i) ? ++$i : $i = 1 }} </td>
							<td> {{ $row->kode_jenis }} </td>
							<td> {{ $row->nama }} </td>
							<td> {{ $row->nilai }} </td>

						<td>
							<form action = "{{ url('/data-tagihan', $row->nilai) }}" method = "post">
							<!-- Button trigger modal -->
							<a data-toggle="modal" data-no_tagihan="{{ $row->no_tagihan }}"data-kode_jenis="{{ $row->kode_jenis }}" 
							data-nilai="{{ $row->nilai }}"title="Add this item" class="open-EditData badge badge-warning" href="#editDataDialog">Change</a>
							@csrf
							@method('DELETE')
							<a class="badge badge-danger" href="/data-tagihan/deleteAdd/{{ $row->nilai}}">Delete</a>
							</form>
						</td>
						</tr>
					</tbody>
					@endforeach
					@endif
				</table>
				</div>
			</div>
		</div>
    <!-- /#page-content-wrapper -->

  </div>


<!-- Modal Tambah Tagihan !!! -->
<div class="modal fade" id="tambahTagihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form action="{{ url('data-tagihan/storeAdd') }}" method="post">
						<input type="hidden" class="form-control" id="kode_lokasi" name="kode_lokasi" value="&nbsp">
						<input type="hidden" class="form-control" id="no_tagihan" name="no_tagihan" value="<?= @$tagihan->no_tagihan ?>">
						@csrf
						<div class="form-group">
							<label for="kode_jenis" class="col-form-label">Kode Jenis Tagihan</label><br>
							<select name="kode_jenis" id="kode_jenis">
								<option value="">-- Pilih Kode Jenis Tagihan --</option>
								@foreach($jenis as $row)
								<option value="{{ $row->kode_jenis}}">{{ $row->kode_jenis}} - {{ $row->nama}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="nilai" class="col-form-label">Nilai</label>
							<input type="number" class="form-control" id="nilai" name="nilai">
						</div>
		</div>
      <div class="modal-footer">
        <a class="badge badge-secondary" href="" data-dismiss="modal">Close</A>
        <button type="submit" name="submit" class="badge badge-primary">Save</button>
      </div>
					</form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editDataDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <div class="container-fluid">
				<h1 class="mt-4">Data Tagihan</h1>
				<div class="container">
				<form action = "{{ url('/data-tagihan/updateAdd') }}" method = "post">
								<input type="hidden" class="form-control" id="kode_lokasi" name="kode_lokasi" value="&nbsp">
							@csrf
							@method('PATCH')
							<div class="form-group">
								<label for="kode_jenis" class="col-form-label">Kode Jenis Tagihan</label><br>
								<select name="kode_jenis" id="kode_jenis">
									<option value="">-- Pilih Kode Jenis Tagihan --</option>
									@foreach($jenis as $row)
									<option value="{{ $row->kode_jenis}}">{{ $row->kode_jenis}} - {{ $row->nama}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="nilai" class="col-form-label">Nilai</label>
								<input type="text" class="form-control" id="nilai" name="nilai">
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" name="submit" class="btn btn-primary">Save</button>
					</div>
						</form>
				</div>
			</div>
		</div>
    <!-- /#page-content-wrapper -->

  </div>
      </div>
    </div>
  </div>
</div>

	<script>
		$(document).on("click", ".open-EditData", function () {
			 var no_tagihan = $(this).data('no_tagihan');
			 var nilai = $(this).data('nilai');
			 var kode_jenis = $(this).data('kode_jenis');
			 $(".modal-body #no_tagihan").val( no_tagihan );
			 $(".modal-body #nilai").val( nilai );
			 $(".modal-body #kode_jenis").val( kode_jenis );
		});
	</script>


@endsection