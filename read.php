<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Pegawai | iNet</title>
</head>
<body>
    <header>
        <h3>Pegawai yang sudah terdaftar</h3>
    </header>

    <nav>
        <a href="create.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Gaji</th>
            <th>Kota</th>
            <th>Deskripsi</th>
            <th>Jenis Kelamin</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>
    
    <?php
        $s = "select * from pegawai;";
        $q = mysqli_query($db,$s);

        while($pegawai = mysqli_fetch_array($q)){
            echo "<tr>";
            
            echo "<td>".$pegawai['id']."</td>";
            echo "<td>".$pegawai['nama']."</td>";
            echo "<td>".$pegawai['gaji']."</td>";
            echo "<td>".$pegawai['kota']."</td>";
            echo "<td>".$pegawai['deskripsi']."</td>";
            echo "<td>".$pegawai['gender']."</td>";

            echo "<td>";
            echo "<a href='update.php?id=".$pegawai['id']."'>Edit</a> | ";
            echo "<a href='delete.php?id=".$pegawai['id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
    ?>

    </tbody>    
    </table>

    <p>Total: <?php echo mysqli_num_rows($q) ?></p>

</body>
</html>
