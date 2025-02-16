<?php
include "koneksi.php";
$id=$_GET['id'];
$query=mysqli_query($koneksi," DELETE from nilai where id='$id'");
?>

<script>
    window.location.href= '?page=nilai/index';
</script>