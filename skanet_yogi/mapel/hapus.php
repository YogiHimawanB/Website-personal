<?php
include "koneksi.php";
$id=$_GET['id'];
$query=mysqli_query($koneksi,"delete from mapel where id='$id'");

?>

<script>
    window.location.href= '?page=mapel/index';
</script>