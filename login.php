<?php
require 'config.php';

// Jika sudah login, lempar ke index
if (isset($_SESSION['is_logged_in'])) {
    header("Location: index.php");
    exit;
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitasi data input
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    // Validasi kelengkapan data
    if (empty($username) || empty($password)) {
        $error = $t['empty'];
    } else {
        $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
        if (mysqli_num_rows($query) > 0) {
            $_SESSION['is_logged_in'] = true;
            header("Location: index.php");
            exit;
        } else {
            $error = "Username atau password salah!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body style="font-family: Arial; text-align: center; margin-top: 50px;">
    
    <!-- Tombol Ganti Bahasa -->
    <a href="?lang=id">Indonesia</a> | <a href="?lang=en">English</a>
    
    <h2><?= $t['login']; ?> - <?= $t['title']; ?></h2>
    
    <?php if($error): ?>
        <p style="color:red;"><?= $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="username" placeholder="<?= $t['username']; ?>"><br><br>
        <input type="password" name="password" placeholder="<?= $t['password']; ?>"><br><br>
        <button type="submit"><?= $t['login']; ?></button>
    </form>

</body>
</html>