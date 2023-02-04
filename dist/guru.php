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

        <section id="content" class="col-span-10 bg-[#01004C]/5 text-center h-screen overflow-hidden">
            <div class="m-10 flex justify-between items-center">
                <div class="text-2xl font-semibold">Data Guru</div>
                <div class="dropdown relative">
                    <button class="dropdown-toggle w-10 h-10 rounded-full bg-white shadow-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><span class="fi fi-br-bell relative top-0.5 text-[#01004C]"></button>
                    <ul class="dropdown-menu min-w-max absolute hidden bg-white z-50 float-right list-none text-left rounded-lg shadow-lg" aria-labelledby="dropdownMenuButton1">
                        <li>Laporan 1</li>
                        <li>Laporan 1</li>
                        <li>Laporan 1</li>
                    </ul>
                </div>
            </div>
            <div class="mx-10 bg-white shadow-sm rounded-2xl border overflow-hidden">
                <ul class="nav nav-tabs bg-[#0a088a]/10 nav-justified flex flex-row flex-wrap list-none border-b-0 pl-0 mb-4" id="tabs-tabJustify" role="tablist">
                    <li class="nav-item flex-grow text-center" role="presentation">
                        <a href="#tabs-tabel" class="nav-link w-full block font-medium dark:font-bold text-slate-700 text-sm leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 hover:border-transparent focus:border-transparent active" id="tabs-home-tabJustify" data-bs-toggle="pill" data-bs-target="#tabs-tabel" role="tab" aria-controls="tabs-tabel" aria-selected="true">Tabel</a>
                    </li>
                    <li class="nav-item flex-grow text-center" role="presentation">
                        <a href="#tabs-daftar" class="nav-link w-full block font-medium dark:font-bold text-slate-700 text-sm leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 hover:border-transparent focus:border-transparent" id="tabs-profile-tabJustify" data-bs-toggle="pill" data-bs-target="#tabs-daftar" role="tab" aria-controls="tabs-daftar" aria-selected="false">Data Baru</a>
                    </li>
                </ul>
                <div class="px-6 pb-6">
                    <div class="tab-content" id="tabs-tabContentJustify">
                        <div class="tab-pane fade show active" id="tabs-tabel" role="tabpanel" aria-labelledby="tabs-home-tabJustify">
                            <div class="overflow-auto rounded-lg shadow hidden md:block">
                                <table class="w-full">
                                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                                        <tr>
                                            <th class="p-3 text-sm font-semibold tracking-wide text-center">NIP</th>
                                            <th class="p-3 text-sm font-semibold tracking-wide text-center">Nama</th>
                                            <th class="p-3 text-sm font-semibold tracking-wide text-center">Wali Kelas</th>
                                            <th class="p-3 text-sm font-semibold tracking-wide text-center">No Hp</th>
                                            <th class="p-3 text-sm font-semibold tracking-wide text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $halaman = 4;
                                        $page = isset($_GET["hlm"]) ? (int)$_GET["hlm"] : 1;
                                        $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
                                        $result = mysqli_query($koneksi, "SELECT * FROM tbguru");
                                        $total = mysqli_num_rows($result);
                                        $pages = ceil($total / $halaman);
                                        if (isset($_POST['bcari'])) {
                                            // Tampilkan Data Yang di cari
                                            $keyword = $_POST['tcari'];
                                            $q = "SELECT * FROM tbguru WHERE nip LIKE '%$keyword%' OR namaguru LIKE '%$keyword%' OR walijurusan LIKE '%$keyword%' OR walikelas LIKE '%$keyword%' OR alamat LIKE '%$keyword%' OR nohpguru LIKE '%$keyword%' ORDER BY idguru DESC LIMIT $mulai, $halaman";
                                        } elseif (isset($_POST['breset'])) {
                                            $q = "SELECT * FROM tbguru ORDER BY idguru DESC LIMIT $mulai, $halaman";
                                        } else {
                                            $q = "SELECT * FROM tbguru ORDER BY idguru DESC LIMIT $mulai, $halaman";
                                        }
                                        $query = mysqli_query($koneksi, $q) or die(mysqli_error($koneksi));
                                        $no = $mulai + 1;
                                        while ($data = mysqli_fetch_array($query)) :
                                            $no++
                                        ?>
                                            <tr class="odd:bg-[#0a088a]/5 even:bg-[#0a088a]/10 hover:bg-gray-50">
                                                <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['nip'] ?></td>
                                                <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['namaguru'] ?></td>
                                                <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['walikelas'] . ' - ' . $data['walijurusan'] ?></td>
                                                <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['nohpguru'] ?></td>
                                                <td class="p-1.5 text-sm text-gray-700 text-center whitespace-nowrap">
                                                    <button type="button" class="p-1.5 text-xs font-bold uppercase tracking-wider rounded-lg text-blue-800 bg-blue-200/50 hover:bg-blue-400/60 active:bg-blue-400 transition-all" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $data['nip'] ?>" data-mdb-ripple="true" data-mdb-ripple-color="light">Detail</button>
                                                    <button type="button" class="p-1.5 text-xs font-bold uppercase tracking-wider rounded-lg text-red-800 bg-red-200/50 hover:bg-red-300/60 active:bg-red-400 transition-all" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $data['nip'] ?>" data-mdb-ripple="true" data-mdb-ripple-color="light">Hapus</button>
                                                </td>
                                            </tr>
                                            <?php include "./res/detailguru.php" ?>
                                            <?php include "./res/hapusguru.php" ?>
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
                        <div class="tab-pane fade text-center" id="tabs-daftar" role="tabpanel" aria-labelledby="tabs-profile-tabJustify">
                            <form action="./res/aksi_crud.php" method="post" enctype="multipart/form-data">
                                <div class="bg-[#0a088a]/10 border p-5 rounded-t-lg">
                                    <div class="grid grid-cols-8 2xl:gap-6 gap-3 text-left">

                                        <div class="col-span-3">
                                            <label for="nip" class="block text-sm font-medium text-gray-700 ">NIP</label>
                                            <input required type="number" name="tnip" id="nip" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        </div>

                                        <div class="col-span-5">
                                            <label for="namaguru" class="block text-sm font-medium text-gray-700 ">Nama Guru</label>
                                            <input required maxlength="50" type="text" name="tnamaguru" id="namaguru" autocomplete="given-name" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        </div>

                                        <div class="col-span-5">
                                            <label for="walijurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                                            <select required id="walijurusan" name="twalijurusan" class="text-slate-900 mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500">
                                                <?php
                                                $queryjurusan = mysqli_query($koneksi, "SELECT * FROM tbjurusan");
                                                while ($datajurusan = mysqli_fetch_array($queryjurusan)) {
                                                    echo '<option value="' . $datajurusan['namajurusan'] . '">' . $datajurusan['namajurusan'] . '</option> ';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-span-2">
                                            <label for="walikelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                                            <select required id="walikelas" name="twalikelas" class="text-slate-900 mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500">
                                                <?php
                                                $querykelas = mysqli_query($koneksi, "SELECT * FROM tbkelas");
                                                while ($datakelas = mysqli_fetch_array($querykelas)) {
                                                    echo '<option value="' . $datakelas['namakelas'] . '">' . $datakelas['namakelas'] . '</option> ';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-span-3">
                                            <label for="nohpguru" class="block text-sm font-medium text-gray-700">No Hp</label>
                                            <input required maxlength="15" type="number" name="tnohpguru" id="nohpguru" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        </div>

                                        <div class="col-span-8">
                                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                            <textarea required type="text" rows="4" name="talamat" id="alamat" autocomplete="street-address" class="text-slate-900 mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                        </div>

                                    </div>
                                </div>
                                <div class="bg-blue-900/40 rounded-b-lg shadow-sm shadow-blue-500/40 px-4 py-3 text-right">
                                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent py-2 px-4 text-sm font-medium text-slate-100 shadow-sm bg-blue-700/70 hover:bg-blue-700 active:bg-blue-700/70 transition-all" name="bsimpanguru" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 pt-0.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                        Simpan
                                    </button>
                                    <button type="reset" class="inline-flex justify-center rounded-md border border-transparent py-2 px-4 text-sm font-medium text-slate-100 shadow-sm bg-blue-700/70 hover:bg-blue-700 active:bg-blue-700/70 transition-all" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 pt-0.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Bersihkan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>