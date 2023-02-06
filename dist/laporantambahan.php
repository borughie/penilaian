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

$vnis = "";
$vnamasiswa = "";
$vpoint = "";
$vfoto = "";
date_default_timezone_set('Asia/Kuala_Lumpur');
$vtglkejadian = date("Y-m-d");

if (isset($_GET['hal'])) {

    // Uji Jika Perihal = Edit Data
    if ($_GET['hal'] == "pilih") {

        // Persiapan Tampilkan Data Yang Akan Di Edit
        $tampilsiswa = mysqli_query($koneksi, "SELECT * FROM tbsiswa WHERE nis = '$_GET[nis]'");
        $datasiswa = mysqli_fetch_array($tampilsiswa);

        // Tampilkan Jika data siswa Ada
        if ($datasiswa) {
            $vnis = $datasiswa['nis'];
            $vnamasiswa = $datasiswa['namasiswa'];
            $vpoint = $datasiswa['point'];
            $vfoto = $datasiswa['fotosiswa'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Menu Laporan</title>
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
                <form action="./res/aksi_crud.php" method="post">
                    <div class="grid grid-cols-2 gap-3 items-start justify-bertween">
                        <div class="grid grid-cols-7 grid-flow-row 2xl:gap-6 gap-3 text-left align-bottom">
                            <div class="row-span-2 col-span-2">
                                <div class="flex items-center h-full justify-center">
                                    <label for="fotolaporan" class="flex flex-col items-center justify-center w-32 h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 px-6">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <div class="rounded-full w-20 h-20 flex items-center justify-center overflow-hidden bg-[#01004C]/5">
                                                <img src="<?= $vfoto == "" ? "./img/profil.png" : "img/siswa/" . $vfoto ?>" id="uploadfotolaporan">
                                            </div>
                                        </div>
                                        <input id="fotolaporan" name="tgambarlaporan" type="file" class="hidden" onchange="PreviewImage('fotolaporan','uploadfotolaporan','srcfoto');" />
                                    </label>
                                </div>
                            </div>

                            <div class="col-span-2">
                                <label for="nis" class="block text-sm font-medium text-gray-700 ">NIS</label>
                                <input readonly maxlength="250" type="number" name="tnis" id="nis" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="<?= $vnis ?>">
                            </div>

                            <div class="col-span-1">
                                <label for="point" class="block text-sm font-medium text-gray-700">Point</label>
                                <input readonly maxlength="50" type="text" name="tpoint" id="point" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="<?= $vpoint ?>">
                            </div>

                            <div class="col-span-2 grid items-end">
                                <button type="button" class="flex justify-center items-center h-[42px] rounded-md border border-transparent text-sm font-medium text-white shadow-sm bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition-all leading-4" data-bs-toggle="modal" data-bs-target="#modalTabelSiswa1" data-mdb-ripple="true" data-mdb-ripple-color="light">Pilih Siswa</button>
                            </div>

                            <div class="col-span-5">
                                <label for="namasiswa" class="block text-sm font-medium text-gray-700 ">Nama Siswa</label>
                                <input readonly maxlength="50" type="text" name="tnamasiswa" id="namasiswa" autocomplete="given-name" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="<?= $vnamasiswa ?>">
                            </div>

                            <input type="text" class="hidden" name="tpembuatlaporan" value="<?= $_SESSION['nama'] ?>">

                        </div>
                        <div class="grid grid-cols-7 grid-flow-row 2xl:gap-6 gap-3 text-left align-bottom">

                            <div class="col-span-4">
                                <label for="status" class="block text-sm font-medium text-gray-700 ">Status Point</label>
                                <select name="tstatus" id="status" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="tambah">Penambahan Point</option>
                                    <option value="kurang">Pengurangan Point</option>
                                </select>
                                </label>
                            </div>

                            <div class="col-span-2">
                                <label for="ubahpoint" class="block text-sm font-medium text-gray-700">Point</label>
                                <input maxlength="50" type="text" name="tubahpoint" id="ubahpoint" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div class="col-span-1 grid items-end">
                                <button type="submit" name="bsimpantambahan" class="flex justify-center items-center h-[42px] rounded-md border border-transparent text-sm font-medium text-white shadow-sm bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition-all leading-4" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                    Simpan
                                </button>
                            </div>


                            <div class="col-span-7">
                                <label for="alasan" class="block text-sm font-medium text-gray-700">Alasan</label>
                                <textarea name="talasan" id="alasan" rows="2" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                            </div>

                        </div>
                    </div>
                </form>
                <?php include './res/tabelsiswa1.php'; ?>
            </div>
        </section>
    </div>
</body>

</html>