<?php
include "koneksi.php";
$nis=$_GET['nis'];
$query=mysqli_query($koneksi,"delete from siswa where nis='$nis'");
?>

<script>
    window.location.href= '?page=siswa/index';
</script>