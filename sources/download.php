<?php
if(isset($_GET['download'])){
    $id = $_GET['download'];
    $query = $db->getById('files', $id);
    $data = mysqli_fetch_assoc($query);

    if(file_exists($data['lokasi'])){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($data['lokasi']));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: private');
        header('Pragma: private');
        header('Content-Length: ' . filesize($data['lokasi']));
        ob_clean();
        flush();
        readfile($data['lokasi']);
    } else {
        echo "
        <script>
            alert('Gambar gagal diunduh, file yang diminta tidak ada diserver')
            location.href = history.go(-1);
        </script>
        ";
    }
}
?>