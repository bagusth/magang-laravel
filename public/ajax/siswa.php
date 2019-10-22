<?php
$conn = mysqli_connect("localhost","root","","dbmagang");
function query($query){
  global $conn;
  $hasil = mysqli_query($conn,$query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($hasil)) {
    $rows[] = $row;
  }
  return $rows;
}
$keyword = $_GET["keyword"];
$query = "SELECT * FROM dev_siswa WHERE nama LIKE '%$keyword%' ";
$siswa = query($query);
?>

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
				<?php foreach( $siswa as $s ): ?>
					<tbody>
						<tr> 
              				<td><?= isset($i) ? ++$i : $i =1 ?></td>
							<td><?= $s ['nim'] ?></td>	
							<td><?= $s ['nama'] ?></td>
							<td><?= $s ['kode_jur'] ?> </td>
							<td>
								<a class="badge badge-warning" name="submit" href="">Change</a>
								@csrf
								@method('DELETE')
								<a class="badge badge-danger" href="">Delete</a>
							</td>
						</tr>
					</tbody>
				<?php endforeach; ?>
				</table>
			</div>