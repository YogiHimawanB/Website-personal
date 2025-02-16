<?php
include "koneksi.php";
$id=$_POST['id'];
$nama_mapel=$_POST['nama_mapel'];
$query=mysqli_query($koneksi,"insert into mapel(id,nama_mapel) values('$id','$nama_mapel')");
?>

<script>
    window.location.href= '?page=mapel/index';
</script>