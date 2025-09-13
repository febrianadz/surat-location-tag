<?php

include '../../../function/function.php';

$id_user = $_GET['id'];

$query2 = mysqli_query(
    $conn,
    "SELECT * FROM tb_user WHERE id_user='$id_user'"
);

$data = mysqli_fetch_array($query2);

$file = $data['foto'];

// tentukan direktori penyimpanan file yang akan dihapus
$path = "../../../dist/user/$file";

unlink("$path");

$query = mysqli_query(
    $conn,
    "DELETE FROM tb_user WHERE id_user='$id_user'"
);

if ($query > 0) {
    echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = './'
        </script>";
} else {
    echo 'Perubahan data gagal=<br/>' . mysqli_error();
}
