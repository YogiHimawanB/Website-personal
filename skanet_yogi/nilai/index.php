<?php
include "koneksi.php";
?>

<h1>Data Nilai</h1>

<form method="POST">
    <input type="text" name="keyword" autofocus placeholder="cari..." autocomplete="off" 
        value="<?php echo isset($_POST['keyword']) ? htmlspecialchars($_POST['keyword']) : ''; ?>">
    <button  class="btn btn-primary"type="submit" name="cari">Cari!</button>
    <button class="btn btn-danger"type="submit" name="reset">Reset</button>
</form>
<br>
<a href="?page=nilai/tambah" class="btn btn-secondary">Tambah Data</a>

<table class="table table-striped" border="1">
        <tr>
            <th>Id</th>
            <th>Nis</th>
            <th>Nip</th>
            <th>Id Mapel</th>
            <th>Nilai</th>
            <th>Aksi</th>
        </tr>
        <?php
        if (isset($_POST['cari'])) {
            $keyword = mysqli_real_escape_string($koneksi, $_POST['keyword']);
            $query = mysqli_query($koneksi, "SELECT * FROM nilai WHERE 
                id LIKE '%$keyword%' OR 
                nis LIKE '%$keyword%' OR 
                nip LIKE '%$keyword%' OR 
                id_mapel LIKE '%$keyword%' OR 
                nilai LIKE '%$keyword%' 
                ORDER BY id DESC");
        } elseif (isset($_POST['reset'])) {
            $query = mysqli_query($koneksi, "SELECT * FROM nilai ORDER BY id DESC");
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM nilai ORDER BY id DESC");
        }
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo htmlspecialchars($data['id']); ?></td>
                <td><?php echo htmlspecialchars($data['nis']); ?></td>
                <td><?php echo htmlspecialchars($data['nip']); ?></td>
                <td><?php echo htmlspecialchars($data['id_mapel']); ?></td>
                <td><?php echo htmlspecialchars($data['nilai']); ?></td>
                <td>
                    <a href="?page=nilai/hapus&id=<?php echo urlencode($data['id']); ?>"class="btn btn-danger"onclick="alert('data akan di hapus')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                   <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
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
