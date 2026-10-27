<?php
require 'config.php';
if (!isset($_SESSION['is_logged_in'])) { header("Location: login.php"); exit; }

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id='$id'");
}
header("Location: index.php");
?>