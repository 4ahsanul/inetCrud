<?php

include("config.php");

    // Cek apakah tombol daftar sudah diklik atau blum?
    if(isset($_POST['daftar'])){

        // Ambil data dari formulir
        $nama = $_POST['nama'];
        $gaji = $_POST['gaji'];
        $kota = $_POST['kota'];
        $deskripsi = $_POST['deskripsi'];
        $gender = $_POST['gender'];

        // Buat query
        
        if(empty($_POST["nama"])){
            header('Location: index.php?status=gagal');
        } else {
            $sql = "INSERT INTO pegawai (nama, gaji, kota, deskripsi, gender) VALUE ('$nama', '$gaji', '$kota', '$deskripsi', '$gender')";
            $query = mysqli_query($db, $sql);
            header('Location: index.php?status=sukses');
        }
        
    } 

?>

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
        <h3>Pendataan Pegawai</h3>
    </header>

    <form action="create.php" method="POST">

        <fieldset>

        <p>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" placeholder="nama lengkap" />
        </p>
        <p>
            <label for="gaji">Gaji: </label>
            <textarea name="gaji"></textarea>
        </p>
        <p>
            <label for="kota">Kota: </label>
            <textarea name="kota"></textarea>
        </p>
        <p>
            <label for="deskripsi">Deskripsi: </label>
            <input type="text" name="deskripsi" placeholder="deskripsi" />
        </p>
        <p>
            <label for="gender"> Jenis Kelamin: </label>
            <select name="gender">
                <option>L</option>
                <option>P</option>
            </select>
        </p>
        <p>
            <input type="submit" value="Daftar" name="daftar" />
        </p>

        </fieldset>

    </form>
</body>
</html>
