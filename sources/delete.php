<?php

if(isset($_GET['delete'])){
    $file = $db->getById('files', $_GET['delete']);
    $file = mysqli_fetch_assoc($file);

    $deleteFile = unlink($file['lokasi']);

    if(!$deleteFile){
        echo "<script>
            alert('GAGAL HAPUS FILE! Code: 404')
            document.location.href = 'http://". $_SERVER['HTTP_HOST'] ."/upload-gambar/'
            </script>";
    }
    $delete = $db->deleteById('files', $_GET['delete']);
    if(!$delete){
        echo "<script>
            alert('GAGAL HAPUS FILE! Code: 500')
            document.location.href = history.go(-1)
            </script>";
    } else {
        echo "<script>
            alert('BERHASIL UPLOAD FILE! Code: 200')
            document.location.href = 'http://". $_SERVER['HTTP_HOST'] ."/upload-gambar/'
            </script>";
    }
}