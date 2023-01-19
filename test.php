<?php
require 'db/Connection.php';
use \DB\Query as DB;


$db = new DB();
$query = $db->getById("files", 3);
var_dump($query);

?>

<ol>
    <?php foreach ($query as $q):?>
    <li>
        <ul>
            <li>ID: <?= $q['id']?></li>
            <li>NAMA: <?= $q['nama'] ?></li>
            <li>LOKASI: <?= $q['lokasi'] ?></li>
        </ul>
    </li>
    <?php endforeach; ?>
</ol>
