<section id="left-sidebar" class="pl-4 col-span-2 text-center h-screen bg-[#01004C]/5 flex flex-col justify-between sticky bottom-0 left-0 select-none">
    <img src="./img/logo.png" class="xl:w-28 2xl:w-40 mt-10 mb-12 mx-auto">
    <div class="flex flex-col h-full items-end content-between justify-between bg-white border rounded-t-xl py-5">
        <div class="flex flex-col w-full px-5 mx-auto font-medium text-[#0a088a]">

            <a href="./admin.php" class="relative text-left hover:text-[#3230bb] transition-all duration-150 rounded-lg mb-1.5 hover:bg-[#1512d4]/20 active:bg-[#1512d4]/50 xl:py-2 xl:px-4 2xl:py-2.5 hover:pl-5 <?= $_SESSION['tipe'] == "Bimbingan Konseling" ? 'block' : 'hidden' ?>">
                <div class="absolute h-6 w-1 left-0 rounded-l-[1px] rounded-r-2xl bg-inherit bg-white"></div>
                <span class="fi fi-br-house-chimney-window relative top-0.5 mr-2.5"></span>
                Dashboard
            </a>
            <a href="./admin.php" class="relative text-left hover:text-[#3230bb] transition-all duration-150 rounded-lg mb-1.5 hover:bg-[#1512d4]/20 active:bg-[#1512d4]/50 xl:py-2 xl:px-4 2xl:py-2.5 hover:pl-5 <?= $_SESSION['tipe'] == "Guru" ? 'block' : 'hidden' ?>">
                <div class="absolute h-6 w-1 left-0 rounded-l-[1px] rounded-r-2xl bg-inherit bg-white"></div>
                <span class="fi fi-br-house-chimney-window relative top-0.5 mr-2.5"></span>
                Dashboard
            </a>
            <a href="./admin.php" class="relative text-left hover:text-[#3230bb] transition-all duration-150 rounded-lg mb-1.5 hover:bg-[#1512d4]/20 active:bg-[#1512d4]/50 xl:py-2 xl:px-4 2xl:py-2.5 hover:pl-5 <?= $_SESSION['tipe'] == "Siswa" ? 'block' : 'hidden' ?>">
                <div class="absolute h-6 w-1 left-0 rounded-l-[1px] rounded-r-2xl bg-inherit bg-white"></div>
                <span class="fi fi-br-house-chimney-window relative top-0.5 mr-2.5"></span>
                Dashboard
            </a>

            <a class="relative text-left hover:text-[#3230bb] transition-all duration-150 rounded-lg mb-1.5 hover:bg-[#1512d4]/20 active:bg-[#1512d4]/50 xl:py-2 xl:px-4 2xl:py-2.5 hover:pl-5 text-truncate" data-bs-toggle="collapse" href="#collapsePelanggaran" role="button" aria-expanded="false" aria-controls="collapsePelanggaran">
                <div class="absolute h-6 w-1 left-0 rounded-l-[1px] rounded-r-2xl bg-inherit bg-white"></div>
                <span class="fi fi-br-document relative top-0.5 mr-2.5"></span>
                Data Pelanggaran
            </a>
            <div class="collapse" id="collapsePelanggaran">
                <div class="p-1.5 w-full text-left shadow-sm rounded-lg mt-1.5 bg-slate-100">
                    <a href="./pelanggaran.php" class="relative text-left hover:text-[#3230bb] transition-all duration-150 rounded-lg w-full block hover:bg-[#1512d4]/20 active:bg-[#1512d4]/50 xl:py-2 xl:px-4 2xl:py-2.5 hover:pl-5 text-truncate">
                        <div class="absolute h-6 w-1 left-0 rounded-l-[1px] rounded-r-2xl bg-inherit bg-white"></div>
                        <span class="fi fi-br-document relative top-0.5 mr-2.5"></span>
                        Nama Pelanggaran
                    </a>
                    <a href="./laporanbaru.php" class="relative text-left hover:text-[#3230bb] transition-all duration-150 rounded-lg w-full block hover:bg-[#1512d4]/20 active:bg-[#1512d4]/50 xl:py-2 xl:px-4 2xl:py-2.5 hover:pl-5 text-truncate">
                        <div class="absolute h-6 w-1 left-0 rounded-l-[1px] rounded-r-2xl bg-inherit bg-white"></div>
                        <span class="fi fi-br-camera relative top-0.5 mr-2.5"></span>
                        Buat Laporan
                    </a>
                    <a href="./laporanonproses.php" class="relative text-left hover:text-[#3230bb] transition-all duration-150 rounded-lg w-full block hover:bg-[#1512d4]/20 active:bg-[#1512d4]/50 xl:py-2 xl:px-4 2xl:py-2.5 hover:pl-5 text-truncate">
                        <div class="absolute h-6 w-1 left-0 rounded-l-[1px] rounded-r-2xl bg-inherit bg-white"></div>
                        <span class="fi fi-br-document-signed relative top-0.5 mr-2.5"></span>
                        On Proses
                    </a>
                    <a href="./laporanterverifikasi.php" class="relative text-left hover:text-[#3230bb] transition-all duration-150 rounded-lg w-full block hover:bg-[#1512d4]/20 active:bg-[#1512d4]/50 xl:py-2 xl:px-4 2xl:py-2.5 hover:pl-5 text-truncate">
                        <div class="absolute h-6 w-1 left-0 rounded-l-[1px] rounded-r-2xl bg-inherit bg-white"></div>
                        <span class="fi fi-br-assept-document relative top-0.5 mr-2.5"></span>
                        Terverifikasi
                    </a>

                    <a href="./laporantambahan.php" class="relative text-left hover:text-[#3230bb] transition-all duration-150 rounded-lg w-full block hover:bg-[#1512d4]/20 active:bg-[#1512d4]/50 xl:py-2 xl:px-4 2xl:py-2.5 hover:pl-5 text-truncate">
                        <div class="absolute h-6 w-1 left-0 rounded-l-[1px] rounded-r-2xl bg-inherit bg-white"></div>
                        <span class="fi fi-br-assept-document relative top-0.5 mr-2.5"></span>
                        Tambahan
                    </a>
                </div>
            </div>

            <a class="relative text-left hover:text-[#3230bb] transition-all duration-150 rounded-lg mb-1.5 hover:bg-[#1512d4]/20 active:bg-[#1512d4]/50 xl:py-2 xl:px-4 2xl:py-2.5 hover:pl-5 text-truncate" data-bs-toggle="collapse" href="#collapseSiswa" role="button" aria-expanded="false" aria-controls="collapseSiswa">
                <div class="absolute h-6 w-1 left-0 rounded-l-[1px] rounded-r-2xl bg-inherit bg-white"></div>
                <span class="fi fi-br-document relative top-0.5 mr-2.5"></span>
                Data Siswa
            </a>
            <div class="collapse" id="collapseSiswa">
                <div class="p-1.5 w-full text-left shadow-sm rounded-lg mt-1.5 bg-slate-100">

                    <a href="./siswabaru.php" class="relative text-left hover:text-[#3230bb] transition-all duration-150 rounded-lg w-full block hover:bg-[#1512d4]/20 active:bg-[#1512d4]/50 xl:py-2 xl:px-4 2xl:py-2.5 hover:pl-5 text-truncate">
                        <div class="absolute h-6 w-1 left-0 rounded-l-[1px] rounded-r-2xl bg-inherit"></div>
                        <span class="fi fi-br-users relative top-0.5 mr-2.5"></span>
                        Siswa Baru
                    </a>

                    <a href="./datasiswa.php" class="relative text-left hover:text-[#3230bb] transition-all duration-150 rounded-lg w-full block hover:bg-[#1512d4]/20 active:bg-[#1512d4]/50 xl:py-2 xl:px-4 2xl:py-2.5 hover:pl-5 text-truncate">
                        <div class="absolute h-6 w-1 left-0 rounded-l-[1px] rounded-r-2xl bg-inherit"></div>
                        <span class="fi fi-br-users relative top-0.5 mr-2.5"></span>
                        Table Siswa
                    </a>

                </div>
            </div>

            <a class="relative text-left hover:text-[#3230bb] transition-all duration-150 rounded-lg hover:bg-[#1512d4]/20 active:bg-[#1512d4]/50 xl:py-2 xl:px-4 2xl:py-2.5 hover:pl-5 text-truncate" data-bs-toggle="collapse" href="#collapseGuru" role="button" aria-expanded="false" aria-controls="collapseGuru">
                <div class="absolute h-6 w-1 left-0 rounded-l-[1px] rounded-r-2xl bg-inherit bg-white"></div>
                <span class="fi fi-br-document relative top-0.5 mr-2.5"></span>
                Data Guru
            </a>
            <div class="collapse" id="collapseGuru">
                <div class="p-1.5 w-full text-left shadow-sm rounded-lg mt-1.5 bg-slate-100">

                    <a href="./gurubaru.php" class="relative text-left hover:text-[#3230bb] transition-all duration-150 rounded-lg w-full block hover:bg-[#1512d4]/20 active:bg-[#1512d4]/50 xl:py-2 xl:px-4 2xl:py-2.5 hover:pl-5 text-truncate">
                        <div class="absolute h-6 w-1 left-0 rounded-l-[1px] rounded-r-2xl bg-inherit"></div>
                        <span class="fi fi-br-users relative top-0.5 mr-2.5"></span>
                        Guru Baru
                    </a>

                    <a href="./dataguru.php" class="relative text-left hover:text-[#3230bb] transition-all duration-150 rounded-lg w-full block hover:bg-[#1512d4]/20 active:bg-[#1512d4]/50 xl:py-2 xl:px-4 2xl:py-2.5 hover:pl-5 text-truncate">
                        <div class="absolute h-6 w-1 left-0 rounded-l-[1px] rounded-r-2xl bg-inherit"></div>
                        <span class="fi fi-br-users relative top-0.5 mr-2.5"></span>
                        Table Guru
                    </a>

                </div>
            </div>

            <a href="./tambahanadmin.php" class="relative text-left text-[#0a088a] hover:text-[#3230bb] transition-all duration-150 rounded-lg mt-1.5 hover:bg-[#1512d4]/20 active:bg-[#1512d4]/50 xl:py-2 xl:px-4 2xl:py-2.5 hover:pl-5">
                <div class="absolute h-6 w-1 left-0 rounded-l-[1px] rounded-r-2xl bg-inherit"></div>
                <span class="fi fi-br-users relative top-0.5 mr-2.5"></span>
                Tambahan
            </a>


        </div> <!-- Menu -->
        <div class="mx-auto flex flex-col justify-center w-full">
            <div class="bg-white shadow-sm border p-3 rounded-3xl relative mx-3 mb-4">
                <div class="flex flex-col justify-center my-6">
                    <div class="text-xl font-semibold text-truncate"><?= ucwords($_SESSION['nama']) ?></div>
                    <div class="text-sm text-truncate"><?= ucwords($_SESSION['tipe']) ?></div>
                </div>
                <a href="#" class="h-12 bg-[#1512d4]/30 rounded-2xl flex justify-center items-center">asd</a>
            </div>
            <a href="./res/logout.php" class="bg-[#01004C]/5 text-center text-[#01004C] rounded-full transition-all duration-150 hover:bg-[#0a088a]/10 active:bg-[#1512d4]/30 xl:mx-14 2xl:mx-20 xl:py-2 2xl:py-2.5 font-semibold">Keluar<span class="fi fi-br-sign-out-alt relative top-0.5 ml-2"></span></a>
        </div>
    </div>
</section>