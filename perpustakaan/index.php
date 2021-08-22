<?php

include "config/koneksi.php";
include "library/oop.php";

$go = new oop();
$tabel = 'buku';
$field = array(
    'kode' => @$_POST['kode'],
    'judul' => @$_POST['judul'],
    'pengarang' => @$_POST['pengarang'],
    'tgl' => @$_POST['tgl'],
);

@$redirect = '?menu=buku';
@$where = "no = $_GET[no]";

if (isset($_POST['simpan'])) {
    $go->simpan($con, $tabel, $field, $redirect);
}
?>

<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
<title>Perpustakaan Guru</title>
</head>
<body>
<form method="post">
	<div class="container">
		<table align="center">
		<h3 align="center">INPUT DATA BUKU</h3>
		<div class="mb-3">
			<label class="form-label">Kode Item</label>
			<input type="text" name="kode" class="form-control"></div>
		<div class="mb-3">
			<label class="form-label">Judul Buku</label>
			<input type="text" name="judul" class="form-control"></div>
		<div class="mb-3">
			<label class="form-label">Pengarang</label>
			<input type="text" name="pengarang" class="form-control"></div>
		<div class="mb-3">
			<label class="form-label">Tanggal Pinjam</label>
			<input type="date" name="tgl" class="form-control"></div>
		<?php if (@$_GET['bukuID'] == "") ?>
		<input class="btn btn-primary" type="submit" name="simpan" value="SIMPAN"></table>
	</form>
	<br>
	<table id="example" class="display" style="width:100%">
	<thead>
	<tr>
		<th>NO</th>
		<th>Kode Item</th>
		<th>Judul Buku</th>
		<th>pengarang</th>
		<th>Tanggal Pinjam</th>
	</tr>
	</thead>
	<tbody>
	<?php
$a = $go->tampil($con, $tabel);
$no = 0;
if ($a == "")
{
    echo "
	<tr>
		<td colspan='5' align='center'>No Record</td>
	</tr>
	";
}
else
{
    foreach ($a as $r)
    {
        $no++; ?>
	<tr>
		<td>
<?php echo $r['no'] ?></td>
		<td>
<?php echo $r['kode'] ?></td>
		<td>
<?php echo $r['judul'] ?></td>
		<td>
<?php echo $r['pengarang'] ?></td>
		<td>
<?php echo $r['tgl'] ?></td>
	</tr>
	<?php
    }
} ?></tbody>

	<script src="js/js1.js"></script>
	<script src="js/js2.js"></script>
	<script type="text/javascript">
                $(document).ready(function() {
                    $('#example').DataTable();
                });
            </script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	</tabel>
	</body>
	</html>