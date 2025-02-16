<?php
include "koneksi.php";
$nip=$_GET['nip'];
$query=mysqli_query($koneksi,"delete from guru where nip='$nip'");
?>
<script>
    window.location.href= '?page=guru/index';
</script>
