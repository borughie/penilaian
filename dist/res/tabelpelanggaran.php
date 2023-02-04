<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modalTabelPelanggaran" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-clip-padding rounded-md outline-none text-current">
            <form method="POST" action="./res/aksi_crud.php" enctype="multipart/form-data">
                <input type="hidden" name="tnis" value="<?= $data['nis'] ?>">
                <div class="modal-body relative bg-white/90 border rounded-xl backdrop-blur-sm shadow-none p-3">
                    <div class="flex items-center justify-between pb-2">
                        <div class="text-xl font-semibold">Data Siswa</div>
                        <input type="text" class="text-slate-900 mt-1 block w-96 rounded-full border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Masukan Pencarian Disini">
                        <button type="button" class="inline-flex justify-center items-center rounded-md border border-transparent bg-gray-300 hover:bg-gray-400 active:bg-gray-500 py-1.5 px-2.5 text-sm font-semibold text-gray-800 shadow-sm transition-all" data-bs-dismiss="modal"><span class="fi fi-br-cross"></button>
                    </div>
                    <div class="overflow-auto rounded-lg shadow hidden md:block">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b-2 border-gray-200">
                                <tr>
                                    <th class="w-32 p-3 text-sm font-semibold tracking-wide text-center">No</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-center">Nama Pelanggaran</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-center">Point</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $halaman = 4;
                                $page = isset($_GET["hlm"]) ? (int)$_GET["hlm"] : 1;
                                $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
                                $result = mysqli_query($koneksi, "SELECT * FROM tbsiswa");
                                $total = mysqli_num_rows($result);
                                $pages = ceil($total / $halaman);
                                if (isset($_POST['bcari'])) {
                                    // Tampilkan Data Yang di cari
                                    $keyword = $_POST['tcari'];
                                    $q = "SELECT * FROM tbpelanggaran WHERE namapelanggaran LIKE '%$keyword%' OR point LIKE '%$keyword%' ORDER BY idpelanggaran DESC LIMIT $mulai, $halaman";
                                } elseif (isset($_POST['breset'])) {
                                    $q = "SELECT * FROM tbpelanggaran ORDER BY idpelanggaran DESC LIMIT $mulai, $halaman";
                                } else {
                                    $q = "SELECT * FROM tbpelanggaran ORDER BY idpelanggaran DESC LIMIT $mulai, $halaman";
                                }
                                $query = mysqli_query($koneksi, $q) or die(mysqli_error($koneksi));
                                $no = $mulai + 1;
                                while ($data = mysqli_fetch_array($query)) :

                                ?>
                                    <tr class="odd:bg-[#0a088a]/5 even:bg-[#0a088a]/10 hover:bg-gray-50">
                                        <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $no++ ?></td>
                                        <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['namapelanggaran'] ?></td>
                                        <td class="p-3 text-sm text-gray-700 text-center whitespace-nowrap"><?= $data['point'] ?></td>
                                        <td class="p-1.5 text-sm text-gray-700 text-center whitespace-nowrap">
                                            <a href="laporan.php?hal=laporan&idpelanggaran=<?= $data['idpelanggaran'] ?>" class="p-1.5 text-xs font-bold uppercase tracking-wider rounded-lg text-blue-800 bg-blue-200/50 hover:bg-blue-400/60 active:bg-blue-400 transition-all">Pilih</a>
                                        </td>
                                    </tr>
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
            </form>
        </div>
    </div>
</div>