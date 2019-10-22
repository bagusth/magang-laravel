@extends('layouts.layout')
@section('title', 'Siswa')

<script src="{ {url('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ url('js/siswa-search.js') }}"></script>

@section('content')


<style type="text/css">
		.pagination li{
			float: right;
			list-style-type: none;
			margin:5px;
		}
	</style>

            <div class="container-fluid">
				<h1 class="mt-4">Data Siswa</h1>
				<!-- Button trigger modal -->
							<a class="badge badge-primary" href="" data-toggle="modal" data-target="#exampleModalLong">
								Tambah
							</a>

							<div class="nav justify-content-end">
							<label>Search:
							<form action="" method="post">
       							 <input type="text" class="form-control" name="keyword" id="keyword" size="40" placeholder="Search . . ." autocomplete="off">
      						</form>
							</label>
						</div>
			<div id="container">
				<table id="dtBasicExample" class="table table-striped table-bordered autoWidth" cellspacing="0" width="100%">
					<thead class="thead-dark">
						<tr>
							<th class="th-sm">No</th>
							<th class="th-sm">NIM</th>
							<th class="th-sm">Nama</th>
							<th class="th-sm">Kode Jurusan</th>
							<th class="th-sm">Aksi</th>
						</tr>
					</thead>
				@foreach( $siswa as $s )
					<tbody>
						<tr> 
              				<td>{{ isset($i) ? ++$i : $i =1 }}</td>
							<td>{{ $s-> nim }} </td>	
							<td>{{ $s-> nama }} </td>
							<td>{{ $s-> kode_jur}} </td>
							<td>
								<a class="badge badge-warning" name="submit" href="data-siswa/edit/{{ $s->nim }}">Change</a>
								@csrf
								@method('DELETE')
								<a class="badge badge-danger" href="/data-siswa/delete/{{ $s->nim }}">Delete</a>
							</td>
						</tr>
					</tbody>
				@endforeach
				</table>
						{{ $siswa->links() }}
			</div>
			</div>
		</div>
    <!-- /#page-content-wrapper -->
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      		<div class="modal-body">
				<div class="container">
					<form action="{{ url('/store') }}" method="post">
						@csrf
						<div class="form-group row">
							<label for="nim" class="col-sm-2 col-form-label">NIM</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nim" name="nim">
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-2 col-form-label">Nama</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nama" name="nama">
							</div>
						</div>
						<div class="form-group row">
							<label for="kode_jur" class="col-sm-2 col-form-label">Kode Jurusan</label>
							<div class="col-sm-10">
								<select name="kode_jur">
									<option value="">-- Pilih Kode Jurusan --</option>
									@foreach( $jurusan as $row )
									<option value="<?=$row["kode_jur"]?>"><?=$row["kode_jur"]?> - <?=$row["nama"]?></option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
     		 </div>
							<div class="modal-footer">
								<a class="btn btn-secondary" href="" data-dismiss="modal">Close</a>
								<input type="submit" class="btn btn-success" name="submit" value="Save">
							</div>
					</form>
    </div>
  </div>
@endsection