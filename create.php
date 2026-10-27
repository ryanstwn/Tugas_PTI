<?php
require 'config.php';
if (!isset($_SESSION['is_logged_in'])) { header("Location: login.php"); exit; }

$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitasi data
    $nim = htmlspecialchars($_POST['nim']);
    $nama = htmlspecialchars($_POST['nama']);
    $jurusan = htmlspecialchars($_POST['jurusan']);

    // Percabangan (if-else) untuk validasi data
    if (empty($nim) || empty($nama) || empty($jurusan)) {
        $error = $t['empty'];
    } else {
        mysqli_query($conn, "INSERT INTO mahasiswa (nim, nama, jurusan) VALUES ('$nim', '$nama', '$jurusan')");
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head><title><?= $t['add']; ?></title></head>
<body style="font-family: Arial; padding: 20px;">
    <h2><?= $t['add']; ?></h2>
    
    <?php if($error) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST" action="">
        <label><?= $t['nim']; ?></label><br>
        <input type="text" name="nim"><br><br>

        <label><?= $t['name']; ?></label><br>
        <input type="text" name="nama"><br><br>

        <label><?= $t['major']; ?></label><br>
        <input type="text" name="jurusan"><br><br>

        <button type="submit"><?= $t['save']; ?></button>
        <a href="index.php"><?= $t['back']; ?></a>
    </form>
</body>
</html>