<?php

include './res/koneksi.php';
$jsArray = "var Point = new Array();\n";

session_start();
if (empty($_SESSION['ni'])) {
    header('location:./loginfirst.php');
}

if (isset($_SESSION['pesan'])) {
    $pesan = $_SESSION['pesan'];
    unset($_SESSION['pesan']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Menu Laporan</title>
    <?php include './res/header.php'; ?>
    <script src="./js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#tcari").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tbsiswa tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</head>

<body onload="<?= @$pesan ?>">
    <div class="grid grid-cols-12">
        <?php include './res/sidepanel.php'; ?>

        <section id="content" class="col-span-10 bg-[#01004C]/5 text-center h-screen overflow-hidden">
            <div class="m-10 flex justify-between items-center">
                <div class="text-2xl font-semibold">Data laporan</div>
                <div class="dropdown relative">
                    <button class="dropdown-toggle w-10 h-10 rounded-full bg-white shadow-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><span class="fi fi-br-bell relative top-0.5 text-[#01004C]"></button>
                    <ul class="dropdown-menu min-w-max absolute hidden bg-white z-50 float-right list-none text-left rounded-lg shadow-lg" aria-labelledby="dropdownMenuButton1">
                        <li>Laporan 1</li>
                        <li>Laporan 1</li>
                        <li>Laporan 1</li>
                    </ul>
                </div>
            </div>
            <div class="mx-10 p-6 bg-white shadow-sm rounded-2xl border overflow-hidden">
                <form method="POST" class="grid grid-cols-9 grid-flow-row items-center justify-between gap-x-2">
                    <input type="text" name="tnisnama" id="nisnama" class="col-span-3 text-slate-900 mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500" placeholder="Nis / Nama">

                    <select name="tkelas" id="kelas" class="text-slate-900 mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500">
                        <option value="">Pilih Kelas</option>
                        <option value="X">X</option>
                        <option value="X-A">X - A</option>
                        <option value="X-B">X - B</option>
                        <option value="XI">XI</option>
                        <option value="XI-A">XI - A</option>
                        <option value="XI-B">XI - B</option>
                        <option value="XII">XII</option>
                        <option value="XII-A">XII - A</option>
                        <option value="XII-B">XII - B</option>
                    </select>

                    <select name="tjurusan" id="jurusan" class="col-span-4 text-slate-900 mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500">
                        <option value="">Pilih Jurusan</option>
                        <option value="Akuntansi dan Keuangan Lembaga">Akuntansi dan Keuangan Lembaga</option>
                        <option value="Manajemen Perkantoran dan Layanan Bisnis">Manajemen Perkantoran dan Layanan Bisnis</option>
                        <option value="Pemasaran">Pemasaran</option>
                        <option value="Usaha Layanan Pariwisata">Usaha Layanan Pariwisata</option>
                        <option value="Perhotelan">Perhotelan</option>
                        <option value="Kuliner">Kuliner</option>
                        <option value="Seni dan Ekonomi Kreatif Busana">Seni dan Ekonomi Kreatif Busana</option>
                    </select>

                    <button class="rounded-md border border-transparent py-2 px-4 text-sm font-medium text-white shadow-sm bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition-all" type="submit" name="bcari">Filter</button>
                </form>
                <div class="overflow-auto rounded-lg shadow hidden md:block">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr>
                                <th class="p-3 text-sm font-semibold tracking-wide text-center">Photo</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-center">Nama Siswa</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-center">Pelanggaran</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-center">Point</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-center">Tgl Laporan</th>
                                <th class="w-40 p-3 text-sm font-semibold tracking-wide text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $halaman = 4;
                            $page = isset($_GET["hlm"]) ? (int)$_GET["hlm"] : 1;
                            $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
                            $result = mysqli_query($koneksi, "SELECT * FROM tblaporan");
                            $total = mysqli_num_rows($result);
                            $pages = ceil($total / $halaman);
                            if (isset($_POST['bcari'])) {
                                // Tampilkan Data Yang di cari
                                $nisnama = $_POST['tnisnama'];
                                $kelas = $_POST['tkelas'];
                                $jurusan = $_POST['tjurusan'];
                                $q = "SELECT * FROM tblaporan INNER JOIN tbsiswa ON tblaporan.nis = tbsiswa.nis WHERE tblaporan.namasiswa LIKE '%$nisnama%' AND tbsiswa.kelas LIKE '%$kelas%' AND tbsiswa.jurusan LIKE '%$jurusan%' AND tblaporan.status = 'On Proses' ORDER BY tblaporan.idlaporan DESC LIMIT $mulai, $halaman";
                            } else {
                                $q = "SELECT * FROM tblaporan INNER JOIN tbsiswa ON tblaporan.nis = tbsiswa.nis WHERE tblaporan.status = 'On Proses' ORDER BY tblaporan.idlaporan DESC LIMIT $mulai, $halaman";
                            }
                            $query = mysqli_query($koneksi, $q) or die(mysqli_error($koneksi));
                            $no = $mulai + 1;
                            while ($data = mysqli_fetch_array($query)) :
                                $no++;
                            ?>
                                <tr class="odd:bg-[#0a088a]/5 even:bg-[#0a088a]/10 hover:bg-gray-50 align-middle">
                                    <td class="hidden"><?= $data['idlaporan'] ?></td>
                                    <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><img class="bg-blue-600 rounded-full overflow-hidden h-24 mx-auto" src="<?= @$data['fotolaporan'] == "" ? "./img/picture.png" : "img/laporan/" . $data['fotolaporan'] ?>"></td>
                                    <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['namasiswa'] ?></td>
                                    <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['namapelanggaran'] ?></td>
                                    <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['penguranganpoint'] ?></td>
                                    <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['tglkejadian'] ?></td>
                                    <td class="p-1.5 whitespace-nowrap">
                                        <div class="flex flex-col items-center justify-center gap-y-2">
                                            <button type="button" class="p-1.5 text-xs font-bold uppercase tracking-wider rounded-lg text-blue-800 bg-blue-200/50 hover:bg-blue-400/60 active:bg-blue-400 transition-all" data-bs-toggle="modal" data-bs-target="#modalKonfirmasi<?= $data['idlaporan'] ?>" data-mdb-ripple="true" data-mdb-ripple-color="light">Setujui</button>
                                            <button type="button" class="p-1.5 text-xs font-bold uppercase tracking-wider rounded-lg text-yellow-800 bg-yellow-200/50 hover:bg-yellow-400/60 active:bg-yellow-400 transition-all" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $data['idlaporan'] ?>" data-mdb-ripple="true" data-mdb-ripple-color="light">Edit</button>
                                            <button type="button" class="p-1.5 text-xs font-bold uppercase tracking-wider rounded-lg text-red-800 bg-red-200/50 hover:bg-red-300/60 active:bg-red-400 transition-all" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $data['idlaporan'] ?>" data-mdb-ripple="true" data-mdb-ripple-color="light">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                                <?php include "./res/konfirmasilaporan.php" ?>
                                <?php include "./res/editlaporan.php" ?>
                                <?php include "./res/hapuslaporan.php" ?>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <div class="flex justify-end items-center p-1 text-xs uppercase bg-gray-50 rounded-b-lg">
                        <div class="rounded-full bg-gray-200 py-0.5 px-1 mr-2 flex items-center justify-center font-bold">
                            <?php for ($i = 1; $i <= $pages; $i++) { ?>
                                <a href="?hlm=<?php echo $i; ?>" class="rounded-full w-5 h-5 my-1 mx-0.5 flex items-center justify-center text-blue-800 bg-blue-500/50 hover:bg-blue-600/60 active:bg-blue-700 transition-all"><?php echo $i; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>