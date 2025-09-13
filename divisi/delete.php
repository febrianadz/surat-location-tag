<?php

include '../../../function/function.php';

$id = $_GET['id'];

$query = mysqli_query(
    $conn,
    "DELETE FROM tb_divisi WHERE id_divisi='$id'"
);

if ($query > 0) {
    echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = './'
        </script>";
} else {
    echo 'Perubahan data gagal=<br/>' . mysqli_error();
}
