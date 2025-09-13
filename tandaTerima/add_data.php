<?php
        $tz = 'Asia/Jakarta';
        $dt = new DateTime("now", new DateTimeZone($tz));
        //mendefinisikan folder
        define('UPLOAD_DIR', 'laporan/');
    
        include "../../../function/function.php";
    
        //menangkap variabel
        $img = $_POST['image'];
        $nama = $_POST['nama_penerima'];
        $instansi = $_POST['instansi'];
        $alamat_ins = $_POST['alamat_ins'];
        $time = date('Y-m-d H:i:s');
        $lang = $_POST['lang'];
        $lat = $_POST['lat'];
    
        $img        = str_replace('data:image/jpeg;base64,', '', $img);
        $img        = str_replace(' ', '+', $img);
    
        //resource gambar diubah dari encode
        $data       = base64_decode($img);
    
        //menamai file, file dinamai secara random dengan unik
        $file       = uniqid() . '.png';
        
        //memindahkan file ke folder upload
        file_put_contents(UPLOAD_DIR.$file, $data);
    
        //memasukkan data ke dalam tabel biodata
        mysqli_query($conn, "INSERT INTO tb_laporan VALUES ('', '$nama', '$instansi', '$alamat_ins', '$lang', '$lat', '$time', '$file')");

        header("Location:./");

    ?>