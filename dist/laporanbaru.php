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
                <form action="./res/aksi_crud.php" method="post" enctype="multipart/form-data">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-1 text-left">
                            <div class="flex items-center h-full justify-center">
                                <label for="fotolaporan" class="flex flex-col items-center justify-center w-64 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 px-6 overflow-hidden">
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
                        <div class="col-span-2">
                            <div class="overflow-hidden shadow rounded-md">
                                <div class="bg-[#0a088a]/10 border px-4 py-5">
                                    <div class="grid grid-cols-8 2xl:gap-6 gap-3 text-left">

                                        <div class="col-span-2">
                                            <label for="nis" class="block text-sm font-medium text-gray-700 ">NIS</label>
                                            <input readonly maxlength="250" type="number" name="tnis" id="nis" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="<?= $vnis ?>">
                                        </div>

                                        <div class="col-span-4">
                                            <label for="namasiswa" class="block text-sm font-medium text-gray-700 ">Nama Siswa</label>
                                            <input readonly maxlength="50" type="text" name="tnamasiswa" id="namasiswa" autocomplete="given-name" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="<?= $vnamasiswa ?>">
                                        </div>

                                        <div class="col-span-2 grid items-end">
                                            <button type="button" class="flex justify-center items-center h-[42px] rounded-md border border-transparent text-sm font-medium text-white shadow-sm bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition-all leading-4" data-bs-toggle="modal" data-bs-target="#modalTabelSiswa" data-mdb-ripple="true" data-mdb-ripple-color="light">Pilih Siswa</button>
                                        </div>

                                        <div class="col-span-5">
                                            <label for="namapelanggaran" class="block text-sm font-medium text-gray-700 ">Nama Pelanggaran</label>
                                            <select name="tnamapelanggaran" id="namapelanggaran" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" onchange="changeValue(this.value)">
                                                <?php
                                                include "koneksi.php";
                                                $jsArray = "var Point = new Array();\n";
                                                $query = mysqli_query($koneksi, "SELECT * FROM tbpelanggaran GROUP BY namapelanggaran ORDER BY namapelanggaran");
                                                while ($data = mysqli_fetch_array($query)) {
                                                    echo '<option value="' . $data['namapelanggaran'] . '">' . $data['namapelanggaran'] . '</option> ';
                                                    $jsArray .= "Point['" . $data['namapelanggaran'] . "'] = {point:'" . addslashes($data['point']) . "'};\n";
                                                }
                                                ?>
                                            </select>
                                            <script type="text/javascript">
                                                <?php echo $jsArray; ?>

                                                function changeValue(namapelanggaran) {
                                                    document.getElementById('point').value = Point[namapelanggaran].point;
                                                };
                                            </script>
                                        </div>

                                        <div class="col-span-2">
                                            <label for="point" class="block text-sm font-medium text-gray-700">Point</label>
                                            <input readonly maxlength="50" type="text" name="tpoint" id="point" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        </div>


                                        <div class="col-span-4">
                                            <label for="tglkejadian" class="block text-sm font-medium text-gray-700">Tgl. Kejadian Pelanggaran</label>
                                            <input type="date" name="ttglkejadian" id="tglkejadian" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="<?= $vtglkejadian ?>">
                                        </div>

                                        <input type="text" class="hidden" name="tpembuatlaporan" value="<?= $_SESSION['nama'] ?>">

                                    </div>
                                </div>
                                <div class="bg-blue-900/40 rounded-b-lg shadow-sm shadow-blue-500/40 px-4 py-3 text-right">
                                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent py-2 px-4 text-sm font-medium text-white shadow-sm bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition-all" name="bsimpanlaporan" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 pt-0.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                        Simpan
                                    </button>
                                    <a href="./laporanbaru.php" class="inline-flex justify-center rounded-md border border-transparent py-2 px-4 text-sm font-medium text-white shadow-sm bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition-all" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 pt-0.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Bersihkan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php include './res/tabelsiswa.php'; ?>
            </div>
        </section>
    </div>
    <script>
        function PreviewImage(el, prev, src) {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById(el).files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById(prev).src = oFREvent.target.result;
                document.getElementById(src).innerHTML = document.getElementById(el).files.item(0).name;
            };
        };
    </script>
</body>

</html>