<?php
require 'config.php';

// Cek Proteksi Halaman
if (!isset($_SESSION['is_logged_in'])) {
    header("Location: login.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head><title><?= $t['title']; ?></title></head>
<body style="font-family: Arial; padding: 20px;">

    <a href="?lang=id">ID</a> | <a href="?lang=en">EN</a> 
    <a href="logout.php" style="float: right; color: red;"><?= $t['logout']; ?></a>
    
    <h2><?= $t['title']; ?></h2>
    
    <a href="create.php">
        <button style="margin-bottom: 15px;"><?= $t['add']; ?></button>
    </a>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr>
            <th>No</th>
            <th><?= $t['nim']; ?></th>
            <th><?= $t['name']; ?></th>
            <th><?= $t['major']; ?></th>
            <th><?= $t['action']; ?></th>
        </tr>
        <?php $i = 1; while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td align="center"><?= $i++; ?></td>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['jurusan']; ?></td>
            <td align="center">
                <a href="edit.php?id=<?= $row['id']; ?>"><?= $t['edit']; ?></a> | 
                <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin?');"><?= $t['delete']; ?></a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>