<?php
include "koneksi.php";
$id=$_POST['id'];
$nis=$_POST['nis'];
$nip=$_POST['nip'];
$id_mapel=$_POST['id_mapel'];
$nilai=$_POST['nilai'];
$query=mysqli_query($koneksi,"insert into nilai(id,nis,nip,id_mapel,nilai) values('$id','$nis','$nip','$id_mapel','$nilai')");
?>

<script>
    window.location.href = '?page=nilai/index';
</script>