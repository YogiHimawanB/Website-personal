<?php
error_reporting(0);

// ambil parameter 'page' dan sanitasi inputnya
$page=htmlentities($_GET['page']);
$halaman=$page . ".php";

// cek apakah file  ada dan valied
if(!file_exists($halaman) || empty($page)) {
    include"home.php";
}else{
    include $halaman;
}
?>