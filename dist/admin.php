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
    <title>Menu BK</title>
    <?php include './res/header.php'; ?>
</head>

<body onload="<?= @$pesan ?>">
    <div class="grid grid-cols-12">
        <?php include './res/sidepanel.php'; ?>

        <section id="content" class="col-span-7 bg-[#01004C]/5 text-center h-screen">
            <div class="m-10 flex justify-between items-center">
                <div class="text-2xl font-semibold">Hi, <?= ucwords($_SESSION['nama']) ?>!</div>
                <div class="dropdown relative">
                    <button class="dropdown-toggle w-10 h-10 rounded-full bg-white shadow-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><span class="fi fi-br-bell relative top-0.5 text-[#01004C]"></button>
                    <ul class="dropdown-menu min-w-max absolute hidden bg-white z-50 float-right list-none text-left rounded-lg shadow-lg" aria-labelledby="dropdownMenuButton1">
                        <li>Laporan 1</li>
                        <li>Laporan 1</li>
                        <li>Laporan 1</li>
                    </ul>
                </div>
            </div>
            <div class="m-10 h-52 bg-[#0a088a] rounded-2xl shadow-sm relative flex items-center justify-between bg-repeat bg-contain" style="background-image: url(./img/bg-pattern1.png);">
                <div class="text-left ml-11">
                    <div class="text-2xl leading-8 text-left text-white font-semibold drop-shadow-sm mb-5">Tambah Informasi <br> Penilaian</div>
                    <a href="#" class="bg-[#01004C] px-2.5 py-2 text-white font-semibold rounded-md shadow-sm transition-all duration-150 hover:bg-[#0a088a] active:bg-[#1512d4]">Penilaian</a>
                </div>
                <img src="./img/report.png" class="h-60 mb-8 mr-8">
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
            <!--  -->
            <div class="flex flex-col items-center gap-y-2 py-2 bg-white rounded-xl">
                <div class="shadow-lg rounded-lg overflow-hidden">
                    <div class="py-3 px-5 bg-gray-50">Pelanggaran 6 Bulan Terakhir</div>
                    <canvas class="xl:px-0.5 2xl:px-7 2xl:py-5" id="chartLine"></canvas>
                </div>
            </div>

            <!-- Required chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <!-- Chart line -->
            <script>
                const labels = ["January", "February", "March", "April", "May", "June"];
                const data = {
                    labels: labels,
                    datasets: [{
                        label: "My First dataset",
                        backgroundColor: "hsl(252, 82.9%, 67.8%)",
                        borderColor: "hsl(252, 82.9%, 67.8%)",
                        data: [0, 10, 5, 2, 20, 30, 45],
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

            <!-- <div class="text-xl font-semibold mt-8 py-2 shadow-sm border bg-[#0a088a]/10 rounded-t-xl">5 Pelanggaran Tertinggi</div>
            <div class="flex flex-col items-center gap-y-2 py-2 shadow-sm border bg-white rounded-b-xl">
                <a href="" class="bg-[#01004C] text-left text-slate-50 rounded-full shadow-sm transition-all duration-150 flex items-center hover:bg-[#0a088a] active:bg-[#1512d4] pl-1.5 pr-3.5 py-1.5 xl:text-sm 2xl:text-xl xl:font-normal 2xl:font-semibold"><span class="fi fi-br-1 text-[#01004C] bg-slate-50 h-1 w-1 p-4 rounded-full flex items-center justify-center font-bold mr-2.5"></span>Dashboard</a>
                <a href="" class="bg-[#01004C] text-left text-slate-50 rounded-full shadow-sm transition-all duration-150 flex items-center hover:bg-[#0a088a] active:bg-[#1512d4] pl-1.5 pr-3.5 py-1.5 xl:text-sm 2xl:text-xl xl:font-normal 2xl:font-semibold"><span class="fi fi-br-2 text-[#01004C] bg-slate-50 h-1 w-1 p-4 rounded-full flex items-center justify-center font-bold mr-2.5"></span>Dashboard</a>
                <a href="" class="bg-[#01004C] text-left text-slate-50 rounded-full shadow-sm transition-all duration-150 flex items-center hover:bg-[#0a088a] active:bg-[#1512d4] pl-1.5 pr-3.5 py-1.5 xl:text-sm 2xl:text-xl xl:font-normal 2xl:font-semibold"><span class="fi fi-br-3 text-[#01004C] bg-slate-50 h-1 w-1 p-4 rounded-full flex items-center justify-center font-bold mr-2.5"></span>Dashboard</a>
                <a href="" class="bg-[#01004C] text-left text-slate-50 rounded-full shadow-sm transition-all duration-150 flex items-center hover:bg-[#0a088a] active:bg-[#1512d4] pl-1.5 pr-3.5 py-1.5 xl:text-sm 2xl:text-xl xl:font-normal 2xl:font-semibold"><span class="fi fi-br-4 text-[#01004C] bg-slate-50 h-1 w-1 p-4 rounded-full flex items-center justify-center font-bold mr-2.5"></span>Dashboard</a>
                <a href="" class="bg-[#01004C] text-left text-slate-50 rounded-full shadow-sm transition-all duration-150 flex items-center hover:bg-[#0a088a] active:bg-[#1512d4] pl-1.5 pr-3.5 py-1.5 xl:text-sm 2xl:text-xl xl:font-normal 2xl:font-semibold"><span class="fi fi-br-5 text-[#01004C] bg-slate-50 h-1 w-1 p-4 rounded-full flex items-center justify-center font-bold mr-2.5"></span>Dashboard</a>
            </div> -->
            <!--  -->
            <div class="mt-6 mb-2 text-xl text-left font-semibold">Penilaian Terakhir</div>
            <a href="#" class="bg-white border rounded-2xl shadow-sm p-3 flex items-center justify-between my-3">
                <div class="text-left">
                    <div class="font-semibold text-xl">Adi Gunawan</div>
                    <div>Kelas : XII - UPJ</div>
                </div>
                <div class="text-left font-semibold text-xl bg-[#0a088a]/10 rounded-2xl p-3">+5</div>
            </a>
            <a href="#" class="bg-white border rounded-2xl shadow-sm p-3 flex items-center justify-between my-3">
                <div class="text-left">
                    <div class="font-semibold text-xl">Adi Gunawan</div>
                    <div>Kelas : XII - UPJ</div>
                </div>
                <div class="text-left font-semibold text-xl bg-[#0a088a]/10 rounded-2xl p-3">+5</div>
            </a>
            <a href="#" class="bg-white border rounded-2xl shadow-sm p-3 flex items-center justify-between my-3">
                <div class="text-left">
                    <div class="font-semibold text-xl">Adi Gunawan</div>
                    <div>Kelas : XII - UPJ</div>
                </div>
                <div class="text-left font-semibold text-xl bg-[#0a088a]/10 rounded-2xl p-3">+5</div>
            </a>
            <a href="#" class="bg-white border rounded-2xl shadow-sm p-3 flex items-center justify-between my-3">
                <div class="text-left">
                    <div class="font-semibold text-xl">Adi Gunawan</div>
                    <div>Kelas : XII - UPJ</div>
                </div>
                <div class="text-left font-semibold text-xl bg-[#0a088a]/10 rounded-2xl p-3">+5</div>
            </a>
            <a href="#" class="bg-white border rounded-2xl shadow-sm p-3 hidden 2xl:flex items-center justify-between my-3">
                <div class="text-left">
                    <div class="font-semibold text-xl">Adi Gunawan</div>
                    <div>Kelas : XII - UPJ</div>
                </div>
                <div class="text-left font-semibold text-xl bg-[#0a088a]/10 rounded-2xl p-3">+5</div>
            </a>
        </section>
    </div>
</body>

</html>