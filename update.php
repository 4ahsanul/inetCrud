<?php

include("config.php");

// Jika tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: index.php');
}

// Ambil id dari query string
$id = $_GET['id'];

// Buat query untuk ambil data dari database
$sql = "SELECT * FROM pegawai WHERE id=$id";
$query = mysqli_query($db, $sql);
$pegawai = mysqli_fetch_assoc($query);

// Jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("Data tidak ditemukan...");
}

// Cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // Ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $gaji = $_POST['gaji'];
    $kota = $_POST['kota'];        
    $deskripsi = $_POST['deskripsi'];
    $gender = $_POST['gender'];

    // Buat query update
    $sql = "UPDATE pegawai SET nama='$nama', gaji='$gaji', kota='$kota', deskripsi='$deskripsi', gender='$gender' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // Apakah query update berhasil?
    if( $query ) {
        // Jika berhasil alihkan ke halaman index.php
        header('Location: index.php');
    } else {
        // Jika gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
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
        <h3>Pegawai yang sudah terdaftar</h3>
    </header>

    <form action="" method="POST">

        <fieldset>

            <input type="hidden" name="id" value="<?php echo $pegawai['id'] ?>" />

        <p>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" placeholder="nama lengkap" value="<?php echo $pegawai['nama'] ?>" />
        </p>
        <p>
            <label for="gaji">Gaji: </label>
            <textarea name="gaji"><?php echo $pegawai['gaji'] ?></textarea>
        </p>
        <p>
            <label for="kota">Kota: </label>
            <textarea name="kota"><?php echo $pegawai['kota'] ?></textarea>
        </p>
        <p>
            <label for="deskripsi">Deskripsi: </label>
            <textarea name="deskripsi"><?php echo $pegawai['deskripsi'] ?></textarea>
        </p>
        <p>
            <label for="gender">Jenis Kelamin: </label>
            <?php $gender = $pegawai['gender']; ?>
            <select name="gender">
                <option <?php echo ($gender == 'L') ? "selected": "" ?>>L</option>
                <option <?php echo ($gender == 'P') ? "selected": "" ?>>P</option>           
            </select>
        </p>
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>


    </form>

    </body>
</html>
