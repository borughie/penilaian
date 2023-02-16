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

<body onload="<?= @$pesan ?>" class="bg-[#01004C]/5">
    <navbar id="navbar" class="w-full mx-auto transition-all duration-150 fixed top-1 px-4 sm:px-6 lg:px-8 py-2">
        <div class="mx-auto max-w-7xl px-3 backdrop-blur-sm bg-white/70 rounded-md shadow-sm text-sm font-semibold">
            <div class="flex overflow-hidden items-center justify-between py-2">
                <div class="flex items-center h-full">
                    <img src="./img/logo.png" class="h-9 w-auto">
                    <span class="ml-2 text-lg text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold w-fit h-full overflow-hidden truncate leading-4">SMK Negeri 1 Tarakan</span>
                </div>
                <button class="dropdown-toggle px-3 py-1.5 text-blue-700 font-semibold rounded shadow-sm bg-white hover:bg-blue-200 focus:bg-blue-400 transition-all flex items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="mr-2 text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold"><?= ucfirst($_SESSION['nama']) ?></span>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                    </svg>
                </button>
                <ul class="dropdown-menu w-auto absolute font-semibold hidden bg-white z-50 float-right py-2 list-none text-left rounded-lg shadow-lg mt-1 m-0 leading-8 backdrop-blur-sm" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <a href="./res/logout.php" class="dropdown-item text-sm py-2 my-1 px-2 mx-2 rounded-md font-normal w-full hover:bg-slate-100 text-slate-800">Keluar</a>
                        <a href="./res/logout.php" class="dropdown-item text-sm py-2 my-1 px-2 mx-2 rounded-md font-normal w-full hover:bg-slate-100 text-slate-800">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </navbar>

    <section id="skor" class="mx-auto max-w-7xl h-96 mt-24 flex flex-col items-center justify-center">
        <div class="bg-yellow-500/80 px-20 py-16 rounded-2xl shadow-md shadow-yellow-500 border-4 border-yellow-500 text-center text-2xl font-semibold overflow-hidden relative">
            <div class="text-3xl">Status kamu saat ini</div>
            <div class="text-5xl">Aman</div>
            <div class="text-[280px] bg-yellow-500/20 absolute -right-14 top-[65%] -z-50">100</div>
        </div>
    </section>

    <section id="report" class="mx-auto max-w-7xl bg-white rounded-xl shadow-md">
        <div class="flex items-center justify-between p-4">
            <div class="hidden">a</div>
            <div class="font-semibold text-xl">Pelanggaran</div>
            <!-- <div class="bg-slate-200 rounded-md shadow-sm flex items-center p-1.5">
                <span class="font-semibold ml-2">Tampilan</span>
                <div class="grid items-center grid-cols-2 ml-3">
                    <button class="bg-slate-300 rounded-md shadow-sm py-1 px-2 mx-1">
                        <span class="fi fi-br-grid relative top-0.5 text-base">
                    </button>
                    <button class="bg-slate-300 rounded-md shadow-sm py-1 px-2 mx-1">
                        <span class="fi fi-br-table-tree relative top-0.5 text-base">
                    </button>
                </div>
            </div> -->
        </div>

        <div class="grid grid-cols-4 grid-flow-row gap-4 px-4 my-4">
            <?php
            $halaman = 20;
            $page = isset($_GET["hlm"]) ? (int)$_GET["hlm"] : 1;
            $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
            $result = mysqli_query($koneksi, "SELECT * FROM tbsiswa");
            $total = mysqli_num_rows($result);
            $pages = ceil($total / $halaman);

            $q = "SELECT * FROM tblaporan WHERE nis = '$_SESSION[ni]' AND status = 'Selesai' ORDER BY idlaporan DESC LIMIT $mulai, $halaman";
            $query = mysqli_query($koneksi, $q) or die(mysqli_error($koneksi));
            $no = $mulai + 1;
            while ($data = mysqli_fetch_array($query)) :
                $no++
            ?>
                <button class="bg-slate-300 border-2 border-slate-200 shadow-md rounded-md overflow-hidden" data-bs-toggle="modal" data-bs-target="#modalfoto<?= $data['idlaporan'] ?>" data-mdb-ripple="true" data-mdb-ripple-color="light">
                    <div class="h-44 w-full" style="background-image: url(<?= $data['fotolaporan'] == "" ? "./img/picture.png" : "img/laporan/" . $data['fotolaporan'] ?>); background-size: cover; background-position: center;"></div>
                    <div class="bg-white h-14 px-3 shadow-sm flex items-center justify-between">
                        <div class="text-left leading-6">
                            <div class="font-semibold"><?= $data['namapelanggaran'] ?></div>
                            <div><?= $data['tglkejadian'] ?></div>
                        </div>
                        <div class="text-2xl font-semibold mr-1">-5</div>
                    </div>
                </button>
                <?php include './res/zoomfotopelanggaran.php'; ?>
            <?php endwhile; ?>
        </div>
        <div class="flex justify-end items-center p-1.5 text-xs bg-gray-50 rounded-b-lg">
            <div class="rounded-full bg-gray-200 py-0.5 px-1 mr-2 flex items-center justify-center font-semibold text-lg">
                <div class="mx-2">Halaman</div>
                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                    <a href="?hlm=<?php echo $i; ?>" class="rounded-full w-6 h-6 my-1 mx-0.5 flex items-center justify-center text-blue-800 bg-blue-500/50 hover:bg-blue-600/60 active:bg-blue-700 transition-all"><?php echo $i; ?></a>
                <?php } ?>
            </div>
        </div>
    </section>

</body>

</html>