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
            <div class="mx-10 p-6 bg-white shadow-sm rounded-2xl border overflow-hidden">
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
        </section>
    </div>
</body>

</html>