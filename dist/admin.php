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

date_default_timezone_set('Asia/Kuala_Lumpur');
$jam = date('H');
$bulan1 = date('m') - 1;
$monthName1 = date('F', mktime(0, 0, 0, $bulan1, 10));
$bulan2 = date('m') - 2;
$monthName2 = date('F', mktime(0, 0, 0, $bulan2, 10));
$bulan3 = date('m') - 3;
$monthName3 = date('F', mktime(0, 0, 0, $bulan3, 10));
$bulan4 = date('m') - 4;
$monthName4 = date('F', mktime(0, 0, 0, $bulan4, 10));
$bulan5 = date('m') - 5;
$monthName5 = date('F', mktime(0, 0, 0, $bulan5, 10));
$bulan6 = date('m') - 6;
$monthName6 = date('F', mktime(0, 0, 0, $bulan6, 10));


$bulan = "SELECT * FROM tblaporan ORDER BY month(tgllaporan) DESC LIMIT 6";


$cekppb1 = "SELECT * FROM tblaporan WHERE month(tgllaporan) = '$bulan1'";
$datappb1 = mysqli_query($koneksi, $cekppb1);
$tamplilppb1 = mysqli_num_rows($datappb1);
$cekppb2 = "SELECT * FROM tblaporan WHERE month(tgllaporan) = '$bulan2'";
$datappb2 = mysqli_query($koneksi, $cekppb2);
$tamplilppb2 = mysqli_num_rows($datappb2);
$cekppb3 = "SELECT * FROM tblaporan WHERE month(tgllaporan) = '$bulan3'";
$datappb3 = mysqli_query($koneksi, $cekppb3);
$tamplilppb3 = mysqli_num_rows($datappb3);
$cekppb4 = "SELECT * FROM tblaporan WHERE month(tgllaporan) = '$bulan4'";
$datappb4 = mysqli_query($koneksi, $cekppb4);
$tamplilppb4 = mysqli_num_rows($datappb4);
$cekppb5 = "SELECT * FROM tblaporan WHERE month(tgllaporan) = '$bulan5'";
$datappb5 = mysqli_query($koneksi, $cekppb5);
$tamplilppb5 = mysqli_num_rows($datappb5);
$cekppb6 = "SELECT * FROM tblaporan WHERE month(tgllaporan) = '$bulan6'";
$datappb6 = mysqli_query($koneksi, $cekppb6);
$tamplilppb6 = mysqli_num_rows($datappb6);


$cekppb = "SELECT * FROM tblaporan WHERE month(tgllaporan) = date('m')";
$datappb = mysqli_query($koneksi, $cekppb);
$tamplilppb = mysqli_num_rows($datappb);

$cekppbop = "SELECT * FROM tblaporan WHERE month(tgllaporan) = date('m') AND status = 'On Proses'";
$datappbop = mysqli_query($koneksi, $cekppbop);
$tamplilppbop = mysqli_num_rows($datappbop);

$cekppbs = "SELECT * FROM tblaporan WHERE month(tgllaporan) = date('m') AND status = 'Selesai'";
$datappbs = mysqli_query($koneksi, $cekppbs);
$tamplilppbs = mysqli_num_rows($datappbs);

$cekppbt = "SELECT * FROM tblaporan WHERE month(tgllaporan) = date('m') AND status = 'Tambahan'";
$datappbt = mysqli_query($koneksi, $cekppbt);
$tamplilppbt = mysqli_num_rows($datappbt);



if ($jam >= 5 && $jam < 11) {
    $waktu = 'Selamat Pagi';
} else if ($jam >= 11 && $jam <= 15) {
    $waktu = 'Selamat Siang';
} else if ($jam > 15 && $jam <= 18) {
    $waktu = 'Selamat Sore';
} else if ($jam > 18 && $jam < 19) {
    $waktu = 'Selamat Petang';
} else if ($jam >= 19 && $jam < 22) {
    $waktu = 'Selamat Malam';
} else {
    $waktu = 'Sudah Waktunya tidur';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Menu BK</title>
    <?php include './res/header.php'; ?>
</head>

<body onload="<?= @$pesan ?>">
    <div class="grid grid-cols-12">
        <?php include './res/sidepanel.php'; ?>

        <section id="content" class="px-10 col-span-7 bg-[#01004C]/5 text-center h-screen">
            <div class="mt-10 flex justify-between items-center">
                <div class="text-2xl font-semibold"><?= ucwords($waktu . ', ' . $_SESSION['nama'] . '.') ?></div>
                <div class="dropdown relative">
                    <button class="dropdown-toggle w-10 h-10 rounded-full bg-white shadow-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><span class="fi fi-br-bell relative top-0.5 text-[#01004C]"></button>
                    <ul class="dropdown-menu min-w-max absolute hidden bg-white z-50 float-right list-none text-left rounded-lg shadow-lg" aria-labelledby="dropdownMenuButton1">
                        <li>Laporan 1</li>
                        <li>Laporan 1</li>
                        <li>Laporan 1</li>
                    </ul>
                </div>
            </div>
            <div class="mt-10 h-52 bg-[#0a088a] rounded-2xl shadow-sm relative flex items-center justify-between bg-repeat bg-contain" style="background-image: url(./img/bg-pattern1.png);">
                <div class="text-left ml-11">
                    <div class="text-2xl leading-8 text-left text-white font-semibold drop-shadow-sm mb-5">Tambah Informasi <br> Penilaian</div>
                    <a href="laporanbaru.php" class="bg-[#01004C] px-2.5 py-2 text-white font-semibold rounded-md shadow-sm transition-all duration-150 hover:bg-[#0a088a] active:bg-[#1512d4]">Penilaian</a>
                </div>
                <img src="./img/report.png" class="h-60 mb-8 mr-8">
            </div>

            <div class="my-3 rounded-2xl relative flex items-center justify-between">
                <div class="grid grid-cols-5 grid-flow-row gap-3 items-center justify-between w-full">
                    <div class="w-full col-span-1 bg-[#1512d4]/10 shadow-sm rounded-lg relative p-4 h-24">
                        <div class="text-left">Laporan Bulan Ini</div>
                        <div class="font-semibold text-2xl text-right absolute bottom-2 right-4"><?= $tamplilppb ?></div>
                    </div>
                    <div class="w-full col-span-1 bg-[#1512d4]/10 shadow-sm rounded-lg relative p-4 h-24">
                        <div class="text-left">On Proses</div>
                        <div class="font-semibold text-2xl text-right absolute bottom-2 right-4"><?= $tamplilppbop ?></div>
                    </div>
                    <div class="col-span-3 row-span-4 bg-[#1512d4]/10 shadow-lg rounded-lg overflow-hidden h-full relative">
                        <div class="py-3 px-5 bg-gray-50">Pelanggaran 6 Bulan Terakhir</div>
                        <canvas class="bg-white py-3 px-5" id="chartLine"></canvas>

                        <!-- Required chart.js -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <!-- Chart line -->
                        <script>
                            const labels = ["<?= $monthName6 ?>", "<?= $monthName5 ?>", "<?= $monthName4 ?>", "<?= $monthName3 ?>", "<?= $monthName2 ?>", "<?= $monthName1 ?>"];
                            const data = {
                                labels: labels,
                                datasets: [{
                                    label: "Pelanggaran",
                                    backgroundColor: "hsl(252, 82.9%, 67.8%)",
                                    borderColor: "hsl(252, 82.9%, 67.8%)",
                                    data: [<?= $tamplilppb6 . ',' . $tamplilppb5 . ',' . $tamplilppb4 . ',' . $tamplilppb3 . ',' . $tamplilppb2 . ',' . $tamplilppb1 ?>],
                                }, ],
                            };

                            const configLineChart = {
                                type: "line",
                                data,
                                options: {},
                            };

                            var chartLine = new Chart(
                                document.getElementById("chartLine"),
                                configLineChart
                            );
                        </script>
                    </div>

                    <div class="w-full col-span-1 bg-[#1512d4]/10 shadow-sm rounded-lg relative p-4 h-24">
                        <div class="text-left">Tambahan</div>
                        <div class="font-semibold text-2xl text-right absolute bottom-2 right-4"><?= $tamplilppbt ?></div>
                    </div>
                    <div class="w-full col-span-1 bg-[#1512d4]/10 shadow-sm rounded-lg relative p-4 h-24">
                        <div class="text-left">Selesai</div>
                        <div class="font-semibold text-2xl text-right absolute bottom-2 right-4"><?= $tamplilppbs ?></div>
                    </div>

                </div>
            </div>
        </section>
        <section id="right-sidebar" class="col-span-3 text-center h-screen mx-7">
            <div class="mt-10 mb-6 flex justify-between items-center">
                <div class="text-2xl font-semibold">Laporan</div>
                <div class="dropdown relative">
                    <button class="dropdown-toggle w-10 h-10 rounded-full bg-white shadow-sm hover:bg-[#0a088a]/10 active:bg-[#1512d4]/30" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><span class="fi fi-br-menu-dots-vertical relative top-0.5 text-[#01004C]"></button>
                    <ul class="dropdown-menu min-w-max absolute hidden bg-white z-50 float-right list-none text-left rounded-lg shadow-lg" aria-labelledby="dropdownMenuButton1">
                        <li>Laporan 1</li>
                        <li>Laporan 1</li>
                        <li>Laporan 1</li>
                    </ul>
                </div>
            </div>

            <div class="text-xl font-semibold mt-8 py-2 shadow-sm border bg-[#0a088a]/10 rounded-t-xl">5 Pelanggaran Tertinggi</div>
            <div class="flex flex-col items-center gap-y-2 py-2 shadow-sm border bg-white rounded-b-xl">
                <a href="" class="bg-[#01004C] text-left text-slate-50 rounded-full shadow-sm transition-all duration-150 flex items-center hover:bg-[#0a088a] active:bg-[#1512d4] pl-1.5 pr-3.5 py-1.5 xl:text-sm 2xl:text-xl xl:font-normal 2xl:font-semibold"><span class="fi fi-br-1 text-[#01004C] bg-slate-50 h-1 w-1 p-4 rounded-full flex items-center justify-center font-bold mr-2.5"></span>Dashboard</a>
                <a href="" class="bg-[#01004C] text-left text-slate-50 rounded-full shadow-sm transition-all duration-150 flex items-center hover:bg-[#0a088a] active:bg-[#1512d4] pl-1.5 pr-3.5 py-1.5 xl:text-sm 2xl:text-xl xl:font-normal 2xl:font-semibold"><span class="fi fi-br-2 text-[#01004C] bg-slate-50 h-1 w-1 p-4 rounded-full flex items-center justify-center font-bold mr-2.5"></span>Dashboard</a>
                <a href="" class="bg-[#01004C] text-left text-slate-50 rounded-full shadow-sm transition-all duration-150 flex items-center hover:bg-[#0a088a] active:bg-[#1512d4] pl-1.5 pr-3.5 py-1.5 xl:text-sm 2xl:text-xl xl:font-normal 2xl:font-semibold"><span class="fi fi-br-3 text-[#01004C] bg-slate-50 h-1 w-1 p-4 rounded-full flex items-center justify-center font-bold mr-2.5"></span>Dashboard</a>
                <a href="" class="bg-[#01004C] text-left text-slate-50 rounded-full shadow-sm transition-all duration-150 flex items-center hover:bg-[#0a088a] active:bg-[#1512d4] pl-1.5 pr-3.5 py-1.5 xl:text-sm 2xl:text-xl xl:font-normal 2xl:font-semibold"><span class="fi fi-br-4 text-[#01004C] bg-slate-50 h-1 w-1 p-4 rounded-full flex items-center justify-center font-bold mr-2.5"></span>Dashboard</a>
                <a href="" class="bg-[#01004C] text-left text-slate-50 rounded-full shadow-sm transition-all duration-150 flex items-center hover:bg-[#0a088a] active:bg-[#1512d4] pl-1.5 pr-3.5 py-1.5 xl:text-sm 2xl:text-xl xl:font-normal 2xl:font-semibold"><span class="fi fi-br-5 text-[#01004C] bg-slate-50 h-1 w-1 p-4 rounded-full flex items-center justify-center font-bold mr-2.5"></span>Dashboard</a>
            </div>

            <div class="mt-6 mb-2 text-xl text-left font-semibold">Penilaian Terakhir</div>
            <?php

            $q = "SELECT * FROM tblaporan ORDER BY idlaporan DESC LIMIT 3";
            $query = mysqli_query($koneksi, $q) or die(mysqli_error($koneksi));
            while ($data = mysqli_fetch_array($query)) :

            ?>
                <a href="#" class="bg-gradient-to-r from-white via-white to-white <?= $data['status'] == "Selesai" ? "hover:to-green-400" : "hover:to-yellow-400" ?> border rounded-2xl shadow-sm flex items-center justify-between my-3 pr-2 overflow-hidden">
                    <img src="<?= $data['fotolaporan'] == "" ? "./img/picture.png" : "img/laporan/" . $data['fotolaporan'] ?>" class="h-16 w-16 bg-slate-300 shadow-sm">

                    <div class="text-center">
                        <div class="font-semibold text-truncate"><?= $data['namasiswa'] ?></div>
                        <div class="text-sm text-truncate"><?= $data['namapelanggaran'] ?></div>
                    </div>
                    <div class="text-left font-semibold text-xl bg-[#0a088a]/10 rounded-2xl p-3">-<?= $data['penguranganpoint'] ?></div>
                </a>

            <?php endwhile; ?>

        </section>
    </div>


</body>

</html>