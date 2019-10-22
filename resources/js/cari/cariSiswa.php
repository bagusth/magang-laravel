<?php
require '../../function.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM dev_siswa
			WHERE nim LIKE '%$keyword%' OR
			nama LIKE '%$keyword%' OR
			kode_jur LIKE '%$keyword%'
			";
$siswa = query($query);
?>
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
	<?php $i = 1; ?>
	<?php foreach( $siswa as $row ) : ?>
	<tbody>
		<tr>
			<td><?= $i; ?></td>
			<td><?= $row["nim"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["kode_jur"]; ?></td>
			<td>
				<a class="btn btn-warning" href="edit.php?nim=<?= $row["nim"]; ?>">Change</a>
				<a class="btn btn-danger" href="delete.php?nim=<?= $row["nim"]; ?>">Delete</a>
			</td>
		</tr>
	</tbody>
	<?php $i++ ?>
	<?php endforeach; ?>
</table>