<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modalUbah<?= $data['idlaporan'] ?>" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-clip-padding rounded-md outline-none text-current">
            <form method="POST" action="./res/aksi_crud.php" enctype="multipart/form-data">
                <input type="hidden" name="tidlaporan" value="<?= $data['idlaporan'] ?>">
                <div class="modal-body relative bg-white/90 border rounded-xl backdrop-blur-sm shadow-none">
                    <div class="px-4 py-5">
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

                            <div class="col-span-3">
                                <label for="namapelanggaran" class="block text-sm font-medium text-gray-700 ">Nama Pelanggaran</label>
                                <select name="tnamapelanggaran" id="namapelanggaran" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" onchange="changeValue(this.value)">
                                    <?php
                                    $querypelanggaran = mysqli_query($koneksi, "SELECT * FROM tbpelanggaran");
                                    while ($datapelanggaran = mysqli_fetch_array($querypelanggaran)) {
                                        echo '<option value="' . $datapelanggaran['namapelanggaran'] . '">' . $datapelanggaran['namapelanggaran'] . '</option> ';
                                        $jsArray .= "Point['" . $datapelanggaran['namapelanggaran'] . "'] = {point:'" . addslashes($datapelanggaran['point']) . "'};\n";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-span-2">
                                <label for="point" class="block text-sm font-medium text-gray-700">Point</label>
                                <input readonly maxlength="50" type="text" name="tpoint" id="point" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div class="col-span-4">
                                <label for="tglkejadian" class="block text-sm font-medium text-gray-700">Tgl. Kejadian Pelanggaran</label>
                                <input type="date" name="ttglkejadian" id="tglkejadian" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                        </div>
                    </div>
                    <div class="px-4 pb-6 text-center sm:px-6 rounded-b-xl">
                        <button type="button" class="inline-flex justify-center rounded-md border border-transparent bg-gray-300 hover:bg-gray-400 active:bg-gray-500 py-2 w-32 text-sm font-semibold text-gray-800 shadow-sm transition-all" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-yellow-500 hover:bg-yellow-600 active:bg-yellow-700 py-2 w-32 text-sm font-semibold text-yellow-900 shadow-sm transition-all" name="bubahpelanggaran">Ubah</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>