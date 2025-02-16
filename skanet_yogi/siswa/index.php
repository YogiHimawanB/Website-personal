<?php
include "koneksi.php";
session_start();
if ($_SESSION['status'] != "sukses") {
    header('location:logout.php');
}
?>

<h1>Data Siswa</h1>
<form method="POST">
    <input type="text" name="keyword" autofocus placeholder="Cari..." autocomplete="off" 
        value="<?php echo isset($_POST['keyword']) ? htmlspecialchars($_POST['keyword']) : ''; ?>">
    <button  class="btn btn-primary"type="submit" name="cari">Cari!</button>
    <button class="btn btn-danger"type="submit" name="reset">Reset</button>
</form>
<br>
<a href="?page=siswa/tambah" class="btn btn-secondary">Tambah Data</a>
<table class="table table-striped" border="1">
        <tr>
            <th>Nis</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
        if (isset($_POST['cari'])) {
            $keyword = mysqli_real_escape_string($koneksi, $_POST['keyword']);
            $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR alamat LIKE '%$keyword%' ORDER BY nis DESC");
        } elseif (isset($_POST['reset'])) {
            $query = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY nis DESC");
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY nis DESC");
        }
        while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($data['nis']); ?></td>
                <td><?php echo htmlspecialchars($data['nama']); ?></td>
                <td><?php echo htmlspecialchars($data['alamat']); ?></td>
                <td>
                    <a href="?page=siswa/hapus&nis=<?php echo urlencode($data['nis']); ?>"class="btn btn-danger" onclick="alert('data akan di hapus')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                      </svg></a>
                      
                    <a href="?page=siswa/edit&nis=<?php echo urlencode($data['nis']); ?>" class="btn btn-primary ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                      <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                </svg></a>

                <button type="button" class="btn btn-success" onclick="window.print()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1"/>
                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                    </svg></button>



                </td>
            </tr>
            <?php
        }
        ?>
</table>
