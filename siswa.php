<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Siswa</title>
</head>
<body>
    <form action="" method="get">
        <input type="search" name="cari" id=""><input type="submit" value="Cari">
    </form>
    <br>
    <table border="1">
        <tr>
            <td>No</td>
            <td>NISN</td>
            <td>NAMA</td>
            <td>JENIS KELAMIN</td>
            <td>ALAMAT</td>
            <td>NO HP</td>
            <td>AKSI</td>
        </tr>
        <?php
        include "koneksi.php";
        if(isset($_GET['cari'])){
            $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
            $sql = "SELECT*FROM siswa WHERE nisn='$cari' OR nama='$cari'";

        }else{
            $sql = "SELECT*FROM siswa"; 
        }
        $quary = mysqli_query($koneksi, $sql);
        $no = 1;
        while($data = mysqli_fetch_array($quary)){
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['jk'] == 'P' ? 'Perempuan' : 'Laki-Laki' ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['nohp'] ?></td>
                <td>
                    <a href="delete-siswa.php?nisn=<?= $data['nisn'] ?>">
                        <button>Hapus</button>
                    </a>
                    <a href="edit-siswa.php?nisn=<?= $data['nisn'] ?>">
                        <button>Edit</button>
                    </a>
                </td>
            </tr>
            <?php

        }

        ?>
    </table>
    <br>
        <a href="add_siswa.php"><button>Tambah Siswa</button></a> 
</body>
</html>