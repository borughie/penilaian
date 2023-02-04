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
                <div class="grid grid-cols-8 grid-flow-row 2xl:gap-6 gap-3 text-left align-bottom">

                    <div class="row-span-3 col-span-3">
                        <div class="flex items-center h-full justify-center">
                            <label for="fotolaporan" class="flex flex-col items-center justify-center w-64 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 px-6">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <div class="rounded-full w-40 h-40 flex items-center justify-center overflow-hidden bg-[#01004C]/5">
                                        <img src="./img/picture.png" id="uploadfotolaporan">
                                    </div>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p id="srcfoto" class="text-xs text-gray-500 dark:text-gray-400 text-truncate">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="fotolaporan" name="tgambarlaporan" type="file" class="hidden" onchange="PreviewImage('fotolaporan','uploadfotolaporan','srcfoto');" />
                            </label>
                        </div>
                    </div>

                    <div class="col-span-3">
                        <label for="nis" class="block text-sm font-medium text-gray-700 ">NIS</label>
                        <input readonly maxlength="250" type="number" name="tnis" id="nis" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="<?= $data['nis'] ?>">
                    </div>

                    <div class="col-span-2 grid items-end">
                        <button type="button" class="flex justify-center items-center h-[42px] rounded-md border border-transparent text-sm font-medium text-white shadow-sm bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition-all leading-4" data-bs-toggle="modal" data-bs-target="#modalTabelSiswa1" data-mdb-ripple="true" data-mdb-ripple-color="light">Pilih Siswa</button>
                    </div>

                    <div class="col-span-5">
                        <label for="namasiswa" class="block text-sm font-medium text-gray-700 ">Nama Siswa</label>
                        <input readonly maxlength="50" type="text" name="tnamasiswa" id="namasiswa" autocomplete="given-name" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="<?= $data['namasiswa'] ?>">
                    </div>

                    <div class="col-span-2">
                        <label for="point" class="block text-sm font-medium text-gray-700">Point</label>
                        <input readonly maxlength="50" type="text" name="tpoint" id="point" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                </div>
            </div>
        </section>
    </div>
</body>

</html>