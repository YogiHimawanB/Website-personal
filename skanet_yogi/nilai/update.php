<?php
include "koneksi.php";
$id=$_POST['id'];
$nis=$_POST['nis'];
$nip=$_POST['nip'];
$id_mapel=$_POST['id_mapel'];
$nilai=$_POST['nilai'];
$query=mysqli_query($koneksi,"update nilai set nis='$nis',nip='$nip',id_mapel='$id_mapel',nilai='$nilai' where id='$id'");
?>

<script>
    window.location.href= '?page=nilai/index';
</script>