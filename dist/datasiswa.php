<?php

include './res/koneksi.php';

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
    <title>Menu Siswa</title>
    <?php include './res/header.php'; ?>
</head>

<body onload="<?= @$pesan ?>">
    <div class="grid grid-cols-12">
        <?php include './res/sidepanel.php'; ?>

        <section id="content" class="col-span-10 bg-[#01004C]/5 text-center h-screen overflow-hidden">
            <div class="m-10 flex justify-between items-center">
                <div class="text-2xl font-semibold">Data Siswa</div>
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
                <div class="overflow-auto rounded-lg shadow">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr>
                                <th class="w-32 p-3 text-sm font-semibold tracking-wide text-center">Photo</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-center">NIS</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-center">Nama</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-center">Kelas</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-center">No Hp Siswa</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-center">Poin</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $halaman = 4;
                            $page = isset($_GET["hlm"]) ? (int)$_GET["hlm"] : 1;
                            $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
                            $result = mysqli_query($koneksi, "SELECT * FROM tbsiswa");
                            $total = mysqli_num_rows($result);
                            $pages = ceil($total / $halaman);
                            if (isset($_POST['bcari'])) {
                                // Tampilkan Data Yang di cari
                                $keyword = $_POST['tcari'];
                                $q = "SELECT * FROM tbsiswa WHERE nis LIKE '%$keyword%' OR namasiswa LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' OR kelas LIKE '%$keyword%' OR alamat LIKE '%$keyword%' OR nohpsiswa LIKE '%$keyword%' OR nohporangtua LIKE '%$keyword%' ORDER BY idsiswa DESC LIMIT $mulai, $halaman";
                            } elseif (isset($_POST['breset'])) {
                                $q = "SELECT * FROM tbsiswa ORDER BY idsiswa DESC LIMIT $mulai, $halaman";
                            } else {
                                $q = "SELECT * FROM tbsiswa ORDER BY idsiswa DESC LIMIT $mulai, $halaman";
                            }
                            $query = mysqli_query($koneksi, $q) or die(mysqli_error($koneksi));
                            $no = $mulai + 1;
                            while ($data = mysqli_fetch_array($query)) :
                                $no++
                            ?>
                                <tr class="odd:bg-[#0a088a]/5 even:bg-[#0a088a]/10 hover:bg-gray-50">
                                    <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><img class="bg-blue-600 rounded-full overflow-hidden" src="<?= @$data['fotosiswa'] == "" ? "./img/profil.png" : "img/siswa/" . $data['fotosiswa'] ?>"></td>
                                    <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['nis'] ?></td>
                                    <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['namasiswa'] ?></td>
                                    <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['kelas'] . ' - ' . $data['jurusan'] ?></td>
                                    <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['nohpsiswa'] ?></td>
                                    <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['point'] ?></td>
                                    <td class="p-1.5 text-sm text-gray-700 text-center whitespace-nowrap">
                                        <button type="button" class="p-1.5 text-xs font-bold uppercase tracking-wider rounded-lg text-blue-800 bg-blue-200/50 hover:bg-blue-400/60 active:bg-blue-400 transition-all" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $data['nis'] ?>" data-mdb-ripple="true" data-mdb-ripple-color="light">Detail</button>
                                        <button type="button" class="p-1.5 text-xs font-bold uppercase tracking-wider rounded-lg text-red-800 bg-red-200/50 hover:bg-red-300/60 active:bg-red-400 transition-all" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $data['nis'] ?>" data-mdb-ripple="true" data-mdb-ripple-color="light">Hapus</button>
                                    </td>
                                </tr>
                                <?php include "./res/detailsiswa.php" ?>
                                <?php include "./res/hapussiswa.php" ?>
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