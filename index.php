<?php
require_once "sources/service.php";
include "sources/store.php";
include 'sources/delete.php';
include 'sources/download.php';


include "views/layouts/header.php";

if(isset($_GET['detail'])){
    include 'views/detail.php';
} else {
    include "views/home.php";
}

include "views/layouts/footer.php";


?>
