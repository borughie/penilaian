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
    <title>Menu Pelanggaran</title>
    <?php include './res/header.php'; ?>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* input[type=number] {
            -moz-appearance: textfield;
        } */
    </style>
</head>

<body onload="<?= @$pesan ?>">
    <div class="grid grid-cols-12">
        <?php include './res/sidepanel.php'; ?>
        <section id="content" class="px-10 col-span-10 bg-[#01004C]/5 text-center h-screen overflow-hidden">
            <div class="my-10 flex justify-between items-center">
                <div class="text-2xl font-semibold">Data Pelanggaran</div>
                <div class="dropdown relative">
                    <button class="dropdown-toggle w-10 h-10 rounded-full bg-white shadow-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><span class="fi fi-br-bell relative top-0.5 text-[#01004C]"></button>
                    <ul class="dropdown-menu min-w-max absolute hidden bg-white z-50 float-right list-none text-left rounded-lg shadow-lg" aria-labelledby="dropdownMenuButton1">
                        <li>Laporan 1</li>
                        <li>Laporan 1</li>
                        <li>Laporan 1</li>
                    </ul>
                </div>
            </div>
            <div class="p-6 bg-white shadow-sm rounded-2xl border overflow-hidden">
                <div class="text-lg font-semibold text-left py-3">Tambah Pelanggaran Baru</div>
                <form method="POST" action="./res/aksi_crud.php">
                    <div class="grid grid-cols-8 grid-flow-row 2xl:gap-6 gap-3 text-left align-bottom">

                        <div class="col-span-5">
                            <label for="namapelanggaran" class="block text-sm font-medium text-gray-700 ">Nama Pelanggaran</label>
                            <input required maxlength="25" type="text" name="tnamapelanggaran" id="namapelanggaran" autocomplete="full-name" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="col-span-2">
                            <label for="point" class="block text-sm font-medium text-gray-700 ">Pengurangan Point</label>
                            <input required maxlength="25" type="number" name="tpoint" id="point" autocomplete="full-name" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="col-span-1 grid items-end">
                            <button type="submit" class="flex justify-center items-center h-[42px] rounded-md border border-transparent text-sm font-medium text-white dark:text-slate-100 shadow-sm bg-blue-600 dark:bg-blue-700/70 hover:bg-blue-700 dark:hover:bg-blue-700 active:bg-blue-800 dark:active:bg-blue-700/70 transition-all" name="bsimpanpelanggaran" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 pt-0.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                                Simpan
                            </button>
                        </div>

                    </div>
                </form>
            </div>
            <div class="text-lg font-semibold text-left pt-4 pb-2">Table Pelanggaran</div>
            <div class="overflow-auto rounded-lg shadow hidden md:block">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">No</th>
                            <th class="w-72 p-3 text-sm font-semibold tracking-wide text-center">Nama Pelanggaran</th>
                            <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">Point</th>
                            <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $halaman = 4;
                        $page = isset($_GET["hlm"]) ? (int)$_GET["hlm"] : 1;
                        $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
                        $result = mysqli_query($koneksi, "SELECT * FROM tbpelanggaran");
                        $total = mysqli_num_rows($result);
                        $pages = ceil($total / $halaman);
                        if (isset($_POST['bcari'])) {
                            // Tampilkan Data Yang di cari
                            $keyword = $_POST['tcari'];
                            $q = "SELECT * FROM tbpelanggaran WHERE namapelanggaran LIKE '%$keyword%' OR point LIKE '%$keyword%' ORDER BY idpelanggaran DESC LIMIT $mulai, $halaman";
                        } elseif (isset($_POST['breset'])) {
                            $q = "SELECT * FROM tbpelanggaran ORDER BY idpelanggaran DESC LIMIT $mulai, $halaman";
                        } else {
                            $q = "SELECT * FROM tbpelanggaran ORDER BY idpelanggaran DESC LIMIT $mulai, $halaman";
                        }
                        $query = mysqli_query($koneksi, $q) or die(mysqli_error($koneksi));
                        $no = $mulai + 1;
                        while ($data = mysqli_fetch_array($query)) :

                        ?>
                            <tr class="odd:bg-[#0a088a]/5 even:bg-[#0a088a]/10 hover:bg-gray-50">
                                <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $no++ ?></td>
                                <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['namapelanggaran'] ?></td>
                                <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['point'] ?></td>
                                <td class="p-1.5 text-sm text-gray-700 text-center whitespace-nowrap">
                                    <button type="button" class="p-1.5 text-xs font-bold uppercase tracking-wider rounded-lg text-yellow-800 bg-yellow-200/50 hover:bg-yellow-400/60 active:bg-yellow-400 transition-all" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $data['idpelanggaran'] ?>" data-mdb-ripple="true" data-mdb-ripple-color="light">Ubah</button>
                                    <button type="button" class="p-1.5 text-xs font-bold uppercase tracking-wider rounded-lg text-red-800 bg-red-200/50 hover:bg-red-300/60 active:bg-red-400 transition-all" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $data['idpelanggaran'] ?>" data-mdb-ripple="true" data-mdb-ripple-color="light">Hapus</button>
                                </td>
                            </tr>
                            <?php include "./res/editpelanggaran.php" ?>
                            <?php include "./res/hapuspelanggaran.php" ?>
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
        </section>
    </div>
</body>

</html>