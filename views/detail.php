<?php
$query = $db->getById('files', $_GET['detail']);
$query = mysqli_fetch_assoc($query);

// list of file ext
$gambar = ['jpg', 'JPG', 'png' ,'PNG' ,'jpeg' ,'JPEG', 'png', 'PNG', 'webp', 'WEBP', 'svg', 'SVG'];
$video = ['mp4', 'mov', 'mpg', 'flv', 'mkv'];
$pdf = ['pdf'];
$voice = ['mp3', 'm4a'];

// get file ext
$fileNameParts = explode('/', $query['lokasi']);
$fileName = explode('.', end($fileNameParts)) ;


if(in_array(end($fileName), $gambar)) {
?>
    <img src="<?= APP_URL . '/' . $query['lokasi'] ?>" alt="<?= $query['nama']?>" title="<?= $query['nama']?>">
<?php
} elseif (in_array(end($fileName), $video)) {
?>
    <video src="<?= APP_URL . '/' . $query['lokasi'] ?>" controls>

<?php
} elseif (in_array(end($fileName), $pdf)) {
?>
    <iframe src="<?= APP_URL . '/' . $query['lokasi'] ?>" height="650px" width="100%"></iframe>
<?php
} elseif (in_array(end($fileName), $voice)) {
?>
    <audio src="<?= APP_URL . '/' . $query['lokasi'] ?>" width="100%" controls>
<?php
} else {
    echo "UNKNOWN FILE EXT";
}
die;
?>