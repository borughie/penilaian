<?php

// Panggil Koneksi Database
include "./koneksi.php";
date_default_timezone_set('Asia/Kuala_Lumpur');

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
            } elseif ($user_valid['tipe'] == "Guru") {
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

// Uji Jika Tombol Ubah di Klik
if (isset($_POST['bubahsiswa'])) {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $nama = $_FILES['teditgambarsiswa']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['teditgambarsiswa']['size'];
    $file_tmp = $_FILES['teditgambarsiswa']['tmp_name'];

    if ($ukuran < 5220350) {
        move_uploaded_file($file_tmp, "../img/siswa/" . $nama);
        $ubah = mysqli_query($koneksi, "UPDATE tbsiswa SET
                                                    namasiswa = '$_POST[tnamasiswa]',
                                                    fotosiswa = '$nama', 
                                                    jurusan = '$_POST[tjurusan]',
                                                    kelas = '$_POST[tkelas]',
                                                    alamat = '$_POST[talamat]',
                                                    nohpsiswa = '$_POST[tnohpsiswa]',
                                                    nohporangtua = '$_POST[tnohporangtua]'
                                                WHERE nis = '$_POST[tnis]'
                                                    ");

        // Jika Ubah Sukses
        if ($ubah) {
            session_start();
            $_SESSION['pesan'] = 'update()';
            header('location:../siswa.php');
        } else {
            session_start();
            $_SESSION['pesan'] = 'gagalupdate()';
            header('location:../siswa.php');
        }
    } else {
        session_start();
        $_SESSION['pesan'] = 'terlalubesar()';
        header('location:../siswa.php');
    }
}

if (isset($_POST['bsimpansiswa'])) {
    $qceknis = mysqli_query($koneksi, "SELECT nis FROM tbsiswa WHERE nis = '$_POST[tnis]'");
    $dataceknis = mysqli_fetch_array($qceknis);

    if ($dataceknis) {
        session_start();
        $_SESSION['pesan'] = 'nissudahada()';
        header('location:../siswa.php');
    } else {

        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        $nama = $_FILES['tgambarsiswa']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['tgambarsiswa']['size'];
        $file_tmp = $_FILES['tgambarsiswa']['tmp_name'];
        move_uploaded_file($file_tmp, "../img/siswa/" . $nama);

        $simpan = mysqli_query($koneksi, "INSERT INTO tbsiswa (nis, point, namasiswa, jksiswa, fotosiswa, jurusan, kelas, alamat, nohpsiswa, nohporangtua)
                                       VALUES ('$_POST[tnis]',
                                               100,
                                               '$_POST[tnamasiswa]',
                                               '$_POST[tjksiswa]',
                                               '$nama',
                                               '$_POST[tjurusan]',
                                               '$_POST[tkelas]',
                                               '$_POST[talamat]',
                                               '$_POST[tnohpsiswa]',
                                               '$_POST[tnohporangtua]')");

        $password = md5(substr($_POST['tnis'], -5));
        $simpanuser = mysqli_query($koneksi, "INSERT INTO tbuser (ni, nama, password, tipe)
                                            VALUES ('$_POST[tnis]',
                                                    '$_POST[tnamasiswa]',
                                                    '$password',
                                                    'Siswa')");

        // Jika Simpan Sukses
        if ($simpan || $simpanuser) {
            session_start();
            $_SESSION['pesan'] = 'simpan()';
            header('location:../siswa.php');
        } else {
            session_start();
            $_SESSION['pesan'] = 'gagalsimpan()';
            header('location:../siswa.php');
        }
    }
}

if (isset($_POST['bhapussiswa'])) {

    $hapus = mysqli_query($koneksi, "DELETE FROM tbsiswa WHERE nis = '$_POST[tnis]'");
    $hapususer = mysqli_query($koneksi, "DELETE FROM tbuser WHERE ni = '$_POST[tnis]'");
    if ($hapus || $hapususer) {
        session_start();
        $_SESSION['pesan'] = 'hapus()';
        header('location:../siswa.php');
    } else {
        session_start();
        $_SESSION['pesan'] = 'gagal()';
        header('location:../siswa.php');
    }
}

if (isset($_POST['bsimpanpelanggaran'])) {
    $simpan = mysqli_query($koneksi, "INSERT INTO tbpelanggaran (namapelanggaran, point) VALUES ('$_POST[tnamapelanggaran]','$_POST[tpoint]')");
    // Jika Simpan Sukses
    if ($simpan) {
        session_start();
        $_SESSION['pesan'] = 'simpan()';
        header('location:../pelanggaran.php');
    } else {
        session_start();
        $_SESSION['pesan'] = 'gagalsimpan()';
        header('location:../pelanggaran.php');
    }
}

if (isset($_POST['bubahpelanggaran'])) {
    $ubah = mysqli_query($koneksi, "UPDATE tbpelanggaran SET namapelanggaran = '$_POST[tnamapelanggaran]', point = '$_POST[tpoint]' WHERE idpelanggaran = '$_POST[tidpelanggaran]'");
    // Jika Simpan Sukses
    if ($ubah) {
        session_start();
        $_SESSION['pesan'] = 'update()';
        header('location:../pelanggaran.php');
    } else {
        session_start();
        $_SESSION['pesan'] = 'gagalupdate()';
        header('location:../pelanggaran.php');
    }
}

if (isset($_POST['bhapuspelanggaran'])) {
    $hapus = mysqli_query($koneksi, "DELETE FROM tbpelanggaran WHERE idpelanggaran = '$_POST[tidpelanggaran]'");
    if ($hapus) {
        session_start();
        $_SESSION['pesan'] = 'hapus()';
        header('location:../pelanggaran.php');
    } else {
        session_start();
        $_SESSION['pesan'] = 'gagal()';
        header('location:../pelanggaran.php');
    }
}

if (isset($_POST['bsimpanlaporan'])) {

    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $nama = $_FILES['tgambarlaporan']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['tgambarlaporan']['size'];
    $file_tmp = $_FILES['tgambarlaporan']['tmp_name'];
    $date = date('Y-m-d');
    $pl = $_SESSION['nama'];

    if ($ukuran < 5220350) {
        move_uploaded_file($file_tmp, "../img/laporan/" . $nama);
        $simpan = mysqli_query($koneksi, "INSERT INTO tblaporan (pembuatlaporan, nis, namasiswa, namapelanggaran, penguranganpoint, tglkejadian, tgllaporan, fotolaporan, status)
                                       VALUES ('$_POST[tpembuatlaporan]',
                                               '$_POST[tnis]',
                                               '$_POST[tnamasiswa]',
                                               '$_POST[tnamapelanggaran]',
                                               '$_POST[tpoint]',
                                               '$_POST[ttglkejadian]',
                                               '$date',
                                               '$nama',
                                               'On Proses')");
        // Jika Simpan Sukses
        if ($simpan) {
            session_start();
            $_SESSION['pesan'] = 'simpan()';
            header('location:../laporanbaru.php');
        } else {
            session_start();
            $_SESSION['pesan'] = 'gagalsimpan()';
            header('location:../laporanbaru.php');
        }
    }
}

if (isset($_POST['bhapuslaporan'])) {
    $hapus = mysqli_query($koneksi, "DELETE FROM tblaporan WHERE idlaporan = '$_POST[tidlaporan]'");
    if ($hapus) {
        session_start();
        $_SESSION['pesan'] = 'hapus()';
        header('location:../laporan.php');
    } else {
        session_start();
        $_SESSION['pesan'] = 'gagal()';
        header('location:../laporan.php');
    }
}



if (isset($_POST['bkonfirmasilaporan'])) {

    $ubahlaporan = mysqli_query($koneksi, "UPDATE tblaporan SET status = 'Selesai' WHERE idlaporan = '$_POST[tidlaporan]'");

    $qceknis = mysqli_query($koneksi, "SELECT * FROM tbsiswa WHERE nis = '$_POST[tnis]'");
    $dataceknis = mysqli_fetch_array($qceknis);
    $qcekidlaporan = mysqli_query($koneksi, "SELECT * FROM tblaporan WHERE idlaporan = '$_POST[tidlaporan]'");
    $datacekidlaporan = mysqli_fetch_array($qcekidlaporan);

    $sisapoint = $dataceknis['point'] - $datacekidlaporan['penguranganpoint'];
    $ubahsiswa = mysqli_query($koneksi, "UPDATE tbsiswa SET point = '$sisapoint' WHERE nis = '$_POST[tnis]'");

    // Jika Simpan Sukses
    if ($ubahsiswa) {
        session_start();
        $_SESSION['pesan'] = 'simpan()';
        header('location:../laporan.php');
    } else {
        session_start();
        $_SESSION['pesan'] = 'gagalsimpan()';
        header('location:../laporan.php');
    }
}

if (isset($_POST['bsimpanguru'])) {
    $qceknis = mysqli_query($koneksi, "SELECT nip FROM tbguru WHERE nip = '$_POST[tnip]'");
    $dataceknis = mysqli_fetch_array($qceknis);

    if ($dataceknis) {
        session_start();
        $_SESSION['pesan'] = 'nissudahada()';
        header('location:../siswa.php');
    } else {

        $simpan = mysqli_query($koneksi, "INSERT INTO tbguru (nip, namaguru, walijurusan, walikelas, alamat, nohpguru)
                                       VALUES ('$_POST[tnip]',
                                               '$_POST[tnamaguru]',
                                               '$_POST[twalijurusan]',
                                               '$_POST[twalikelas]',
                                               '$_POST[talamat]',
                                               '$_POST[tnohpguru]')");

        $password = md5(substr($_POST['tnip'], -5));
        $simpanuser = mysqli_query($koneksi, "INSERT INTO tbuser (ni, nama, password, tipe)
                                            VALUES ('$_POST[tnip]',
                                                    '$_POST[tnamaguru]',
                                                    '$password',
                                                    'Guru')");

        // Jika Simpan Sukses
        if ($simpan || $simpanuser) {
            session_start();
            $_SESSION['pesan'] = 'simpan()';
            header('location:../guru.php');
        } else {
            session_start();
            $_SESSION['pesan'] = 'gagalsimpan()';
            header('location:../guru.php');
        }
    }
}

if (isset($_POST['bhapusguru'])) {

    $hapus = mysqli_query($koneksi, "DELETE FROM tbguru WHERE nip = '$_POST[tnip]'");
    $hapususer = mysqli_query($koneksi, "DELETE FROM tbuser WHERE ni = '$_POST[tnip]'");
    if ($hapus || $hapususer) {
        session_start();
        $_SESSION['pesan'] = 'hapus()';
        header('location:../guru.php');
    } else {
        session_start();
        $_SESSION['pesan'] = 'gagal()';
        header('location:../guru.php');
    }
}
