<?php
include 'stringRandom.php';
// cek jika ada tombol send yang dikirim ke halaman ini
if(isset($_POST['send'])){
    $name = $_POST['nama'] == '' ? $_FILES['files']['name'] : $_POST['nama'];

    // mengambil nama file
    $namaFile = getRandomString(10);
    $fileNameParts = explode('.', $_FILES['files']['name']);
    $ext = end($fileNameParts);
    $namaFile = $namaFile . '.'. $ext;


    $tmpFile = $_FILES['files']['tmp_name']; // mengambil data file gambar
    $target = "resources/" . $namaFile;


//    echo $namaFile;
//    var_dump($_FILES);
//    echo $namaFile;
//    echo __DIR__;
//    die;

    $move = move_uploaded_file($tmpFile, $target); // memindahkan data gambar ke folder target
    if(!$move){
        echo "<script>
            alert('GAGAL UPLOAD FILE! Code: 404')
            document.location.href = history.go(-1)
            </script>";
        die;
    }

    // memasukan data file ke database
    $query = $db->storeData('files', $name, $target);

    if($query){
        echo "<script>
            alert('BERHASIL UPLOAD FILE!')
            document.location.href = history.go(-1)
            </script>";
    } else {
        echo "<script>
            alert('GAGAL UPLOAD FILE! Code: 500')
            document.location.href = history.go(-1)
            </script>";
    }
}
