<?php
session_start();
if (isset($_SESSION['pesan'])) {
    $pesan = $_SESSION['pesan'];
    unset($_SESSION['pesan']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Menu Login</title>
    <?php include "./res/header.php"; ?>
    <script src="./js/main.js"></script>
</head>

<body class="bg-[#01004C]/5" onload="<?= @$pesan ?>">
    <div class="grid 2xl:grid-cols-4 xl:grid-cols-3 grid-flow-rowitems-center h-screen sm:mx-24 mx-0 place-content-center">
        <div class="xl:col-span-2 2xl:col-span-3 grid md:grid-flow-row lg:grid-flow-col xl:grid-flow-col gap-x-4 items-center mx-auto sm:mt-0 md:mt-12 sm:mx-3 sm:place-content-center">
            <img src="./img/logo.png" class="h-12 sm:mx-auto sm:h-36 md:h-44 lg:h-28 xl:h-36 2xl:h-44">
            <div class="sm:text-center md:text-center lg:text-left text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-xl mb-3">
                <div class="text-3xl">Sekolah Menengah Kejuruan</div>
                <div class="text-5xl static">Negeri 1 Tarakan</div>
            </div>
        </div>
        <div class="sm:mx-auto mx-2 w-fit md:mt-3 sm:mt-6 grow md:col-span-1 2xl:col-span-1">
            <div class="rounded-lg mx-auto bg-white sm:mx-3 shadow-md p-6">
                <form method="post" action="./res/aksi_crud.php">
                    <label for="niknis" class="text-left block text-sm font-medium text-gray-700 mb-1">NIK / NIS</label>
                    <input required maxlength="50" minlength="5" size="50" type="text" name="tniknis" id="niknis" class="text-slate-900 mb-6 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    <label for="password" class="text-left block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="flex w-full rounded">
                        <input required maxlength="25" minlength="5" type="password" name="tpassword" id="password" autocomplete="current-password" class="text-slate-900 block w-full rounded-l-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 focus:ring-r-0 sm:text-sm">
                        <div class="flex">
                            <span id="btnpassword" onclick="showpassword()" class="flex items-center bg-gray-200 rounded-r-md px-3 text-gray-600 shadow-sm border-gray-300 border border-l-0">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="blogin" class="w-24 text-white shadow-sm bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition-all text-sm font-semibold py-2 rounded-md mt-6">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>