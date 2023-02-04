<?php

// Aktifkan Session
session_start();

unset($_SESSION['ni'], $_SESSION['nama'], $_SESSION['tipe']);

// Hapus Session yang Terdaftar
session_destroy();

session_start();
$_SESSION['pesan'] = "logout()";
echo "<script>
        document.location='../login.php';
      </script>";
