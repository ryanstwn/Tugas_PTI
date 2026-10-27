<?php
require 'config.php';
if (!isset($_SESSION['is_logged_in'])) { header("Location: login.php"); exit; }

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
$mhs = mysqli_fetch_assoc($data);

$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = htmlspecialchars($_POST['nim']);
    $nama = htmlspecialchars($_POST['nama']);
    $jurusan = htmlspecialchars($_POST['jurusan']);

    if (empty($nim) || empty($nama) || empty($jurusan)) {
        $error = $t['empty'];
    } else {
        mysqli_query($conn, "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan' WHERE id='$id'");
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head><title><?= $t['edit']; ?></title></head>
<body style="font-family: Arial; padding: 20px;">
    <h2><?= $t['edit']; ?></h2>
    
    <?php if($error) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST" action="">
        <label><?= $t['nim']; ?></label><br>
        <input type="text" name="nim" value="<?= $mhs['nim']; ?>"><br><br>

        <label><?= $t['name']; ?></label><br>
        <input type="text" name="nama" value="<?= $mhs['nama']; ?>"><br><br>

        <label><?= $t['major']; ?></label><br>
        <input type="text" name="jurusan" value="<?= $mhs['jurusan']; ?>"><br><br>

        <button type="submit"><?= $t['save']; ?></button>
        <a href="index.php"><?= $t['back']; ?></a>
    </form>
</body>
</html>