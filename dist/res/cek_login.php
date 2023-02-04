<?php

// Panggil Koneksi Database
include "./koneksi.php";


if (isset($_POST['blogin'])) {
    // Ambil Inputan Dari Form Login
    $ni = mysqli_escape_string($koneksi, $_POST['tniknis']);
    // Cek Username Terdaftar Atau Tidak
    $cek_user = mysqli_query($koneksi, "SELECT * FROM tbuser WHERE ni = '$ni'");
    $user_valid = mysqli_fetch_array($cek_user);
    // Uji Jika Username Terdaftar
    if ($user_valid) {
        // Jika Username Terdaftar dan Aktif maka
        // Uji Password Sesuai Atau Tidak
        if (md5($_POST['tpassword']) == $user_valid['password']) {
            session_start();
            $_SESSION['ni'] = $user_valid['ni'];
            $_SESSION['nama'] = $user_valid['nama'];
            $_SESSION['tipe'] = $user_valid['tipe'];

            // Jika Password Sesuai, Uji Tipe
            if ($user_valid['tipe'] == "Bimbingan Konseling") {
                session_start();
                $_SESSION['pesan'] = 'login()';
                header('location:../admin.php');
            } elseif ($user_valid['tipe'] == "Siswa") {
                session_start();
                $_SESSION['pesan'] = 'login()';
                header('location:../siswa.php');
            } else {
                session_start();
                $_SESSION['pesan'] = 'tipetidakada()';
                header('location:../login.php');
            }
        } else {
            session_start();
            $_SESSION['pesan'] = 'password()';
            header('location:../login.php');
        }
    } else {
        session_start();
        $_SESSION['pesan'] = 'username()';
        header('location:../login.php');
    }
}
