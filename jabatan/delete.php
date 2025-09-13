<?php

include '../../../function/function.php';

$id = $_GET['id'];

$query = mysqli_query(
    $conn,
    "DELETE FROM tb_jabatan WHERE id_jabatan='$id'"
);

if ($query > 0) {
    echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = './'
        </script>";
} else {
    echo 'Perubahan data gagal=<br/>' . mysqli_error();
}
