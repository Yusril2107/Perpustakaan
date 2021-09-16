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

@$redirect = '?menu=inputbuku';
@$where = "no = $_GET[no]";

if (isset($_POST['simpan'])) {
    $go->simpan($con, $tabel, $field, $redirect);
}
?>

<form method="post">
    <div class="container">
        <table align="center">
            <h3 align="center">INPUT DATA BUKU</h3>
            <div class="mb-3">
                <label class="form-label">Kode Item</label>
                <input type="text" name="kode" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Judul Buku</label>
                <input type="text" name="judul" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Pengarang</label>
                <input type="text" name="pengarang" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Pinjam</label>
                <input type="date" name="tgl" class="form-control">
            </div>
            <div class="mb-3">
                <?php if (@$_GET['no'] == "") ?>
                <input class="btn btn-primary" type="submit" name="simpan" value="SIMPAN">
        </table>
</form>