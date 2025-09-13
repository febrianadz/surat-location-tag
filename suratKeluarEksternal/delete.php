<?php

include '../../../function/function.php';

$no_surat = $_GET['id'];

$query2 = mysqli_query(
    $conn,
    "SELECT * FROM surat_keluar WHERE no_surat='$no_surat'"
);

$data = mysqli_fetch_array($query2);

$file = $data['isi'];

// tentukan direktori penyimpanan file yang akan dihapus
$path = "../../../dist/suratKeluar/$file";

unlink("$path");

$query = mysqli_query(
    $conn,
    "DELETE FROM surat_keluar WHERE no_surat='$no_surat'"
);

if ($query > 0) {
    echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = './'
        </script>";
} else {
    echo 'Perubahan data gagal=<br/>' . mysqli_error();
}
