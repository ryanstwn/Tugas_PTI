<?php
session_start();

// Koneksi Database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "tugas_sim";
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fitur Pengaturan Bahasa menggunakan Session
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

// Set bahasa default jika belum ada
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'id';
}

// Kamus Bahasa
$lang = [
    'id' => [
        'title' => 'Data Mahasiswa',
        'login' => 'Masuk',
        'username' => 'Nama Pengguna',
        'password' => 'Kata Sandi',
        'add' => 'Tambah Data',
        'nim' => 'NIM',
        'name' => 'Nama',
        'major' => 'Jurusan',
        'action' => 'Aksi',
        'edit' => 'Ubah',
        'delete' => 'Hapus',
        'save' => 'Simpan',
        'logout' => 'Keluar',
        'empty' => 'Semua kolom harus diisi!',
        'back' => 'Kembali'
    ],
    'en' => [
        'title' => 'Student Data',
        'login' => 'Login',
        'username' => 'Username',
        'password' => 'Password',
        'add' => 'Add Data',
        'nim' => 'Student ID',
        'name' => 'Name',
        'major' => 'Major',
        'action' => 'Action',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'save' => 'Save',
        'logout' => 'Logout',
        'empty' => 'All fields are required!',
        'back' => 'Back'
    ]
];

$t = $lang[$_SESSION['lang']]; // Variabel terjemahan aktif
?>