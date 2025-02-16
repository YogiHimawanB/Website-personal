<?php
include "koneksi.php";
$id=$_POST['id'];
$nama_mapel=$_POST['nama_mapel'];
$query=mysqli_query($koneksi,"update mapel set nama_mapel='$nama_mapel' where id='$id'");
?>

<script>
    window.location.href= '?page=mapel/index';
</script>