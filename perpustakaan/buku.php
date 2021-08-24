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
        if ($a == "") {
            echo "
	<tr>
		<td colspan='5' align='center'>No Record</td>
	</tr>
	";
        } else {
            foreach ($a as $r) {
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
        } ?>
    </tbody>