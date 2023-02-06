<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modalUbah<?= $data['nis'] ?>" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-clip-padding rounded-md outline-none text-current">
            <form method="POST" action="./res/aksi_crud.php" enctype="multipart/form-data">
                <input type="hidden" name="tnis" value="<?= $data['nis'] ?>">
                <div class="modal-body relative bg-white/90 border rounded-xl backdrop-blur-sm shadow-none">
                    <div class="px-4 py-5">
                        <div class="grid grid-cols-8 grid-flow-row 2xl:gap-6 gap-3 text-left">

                            <div class="row-span-3 col-span-3">
                                <div class="bg-[#1512d4]/30 rounded-xl text-center p-2 font-semibold text-xl">
                                    <label for="editfotosiswa" class="flex flex-col items-center justify-center">
                                        <div class="flex flex-col items-center justify-center p-3">
                                            <div class="rounded-xl w-56 h-56 flex items-center justify-center overflow-hidden bg-[#01004C]/5">
                                                <img src="<?= $data['fotosiswa'] == "" ? "./img/profil.png" : "img/siswa/" . $data['fotosiswa'] ?>" id="edituploadfotosiswa">
                                            </div>
                                            <p id="editsrcfoto" class="hidden mt-2 text-xs text-gray-100"><?= $data['fotosiswa'] == "" ? "SVG, PNG, JPG or GIF (MAX. 800x400px)" : $data['fotosiswa'] ?></p>
                                        </div>
                                        <input id="editfotosiswa" name="teditgambarsiswa" type="file" class="hidden" onchange="PreviewImage('editfotosiswa','edituploadfotosiswa','editsrcfoto');" />
                                    </label>
                                </div>
                            </div>

                            <div class="col-span-3 select-none">
                                <div class="bg-[#1512d4]/30 rounded-xl text-center p-2 font-semibold text-xl">NIS
                                    <div class="bg-[#1512d4]/70 rounded-xl py-1.5 text-white text-base"><?= $data['nis'] ?></div>
                                </div>
                            </div>

                            <div class="col-span-2 select-none">
                                <div class="<?= $data['point'] >= '80' ? 'bg-[#149627]/30' : ($data['point'] >= '50' ? 'bg-yellow-500/50' : 'bg-[#bd160d]/30') ?> rounded-xl text-center p-2 font-semibold text-xl">Poin
                                    <div class="<?= $data['point'] >= '80' ? 'bg-[#149627]/70' : ($data['point'] >= '50' ? 'bg-yellow-500/70' : 'bg-[#bd160d]/70') ?> rounded-xl py-1.5 text-white text-base"><?= $data['point'] ?></div>
                                </div>
                            </div>

                            <div class="col-span-5">
                                <label for="namasiswa" class="block text-sm font-medium text-gray-700 ">Nama Siswa</label>
                                <input required maxlength="25" type="text" name="tnamasiswa" id="namasiswa" autocomplete="full-name" value="<?= $data['namasiswa'] ?>" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div class="col-span-4">
                                <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                                <select required id="jurusan" name="tjurusan" class="text-slate-900 mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500">
                                    <option value="<?= $data['jurusan'] ?>" <?= $data['jurusan'] == "Akuntansi dan Keuangan Lembaga" ? 'selected' : '' ?>>Akuntansi dan Keuangan Lembaga</option>
                                    <option value="<?= $data['jurusan'] ?>" <?= $data['jurusan'] == "Manajemen Perkantoran dan Layanan Bisnis" ? 'selected' : '' ?>>Manajemen Perkantoran dan Layanan Bisnis</option>
                                    <option value="<?= $data['jurusan'] ?>" <?= $data['jurusan'] == "Pemasaran" ? 'selected' : '' ?>>Pemasaran</option>
                                    <option value="<?= $data['jurusan'] ?>" <?= $data['jurusan'] == "Usaha Layanan Pariwisata" ? 'selected' : '' ?>>Usaha Layanan Pariwisata</option>
                                    <option value="<?= $data['jurusan'] ?>" <?= $data['jurusan'] == "Perhotelan" ? 'selected' : '' ?>>Perhotelan</option>
                                    <option value="<?= $data['jurusan'] ?>" <?= $data['jurusan'] == "Kuliner" ? 'selected' : '' ?>>Kuliner</option>
                                    <option value="<?= $data['jurusan'] ?>" <?= $data['jurusan'] == "Seni dan Ekonomi Kreatif Busana" ? 'selected' : '' ?>>Seni dan Ekonomi Kreatif Busana</option>
                                </select>
                            </div>

                            <div class="col-span-1">
                                <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                                <select required id="kelas" name="tkelas" class="text-slate-900 mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500">
                                    <option value="<?= $data['kelas'] ?>" <?= $data['kelas'] == "X" ? 'selected' : '' ?>>X</option>
                                    <option value="<?= $data['kelas'] ?>" <?= $data['kelas'] == "X - A" ? 'selected' : '' ?>>X - A</option>
                                    <option value="<?= $data['kelas'] ?>" <?= $data['kelas'] == "X - B" ? 'selected' : '' ?>>X - B</option>
                                    <option value="<?= $data['kelas'] ?>" <?= $data['kelas'] == "XI" ? 'selected' : '' ?>>XI</option>
                                    <option value="<?= $data['kelas'] ?>" <?= $data['kelas'] == "XI - A" ? 'selected' : '' ?>>XI - A</option>
                                    <option value="<?= $data['kelas'] ?>" <?= $data['kelas'] == "XI - B" ? 'selected' : '' ?>>XI - B</option>
                                    <option value="<?= $data['kelas'] ?>" <?= $data['kelas'] == "XII" ? 'selected' : '' ?>>XII</option>
                                    <option value="<?= $data['kelas'] ?>" <?= $data['kelas'] == "XII - A" ? 'selected' : '' ?>>XII - A</option>
                                    <option value="<?= $data['kelas'] ?>" <?= $data['kelas'] == "XII - B" ? 'selected' : '' ?>>XII - B</option>
                                </select>
                            </div>

                            <div class="col-span-8">
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <textarea required type="text" rows="2" name="talamat" id="alamat" autocomplete="street-address" class="text-slate-900 mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"><?= $data['alamat'] ?></textarea>
                            </div>

                            <div class="col-span-3">
                                <label for="nohpsiswa" class="block text-sm font-medium text-gray-700">No Hp Siswa</label>
                                <input required maxlength="50" type="number" name="tnohpsiswa" id="nohpsiswa" value="<?= $data['nohpsiswa'] ?>" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>


                            <div class="col-span-3">
                                <label for="nohporangtua" class="block text-sm font-medium text-gray-700">No Hp Orang Tua Siswa</label>
                                <input required maxlength="5" type="number" name="tnohporangtua" id="nohporangtua" value="<?= $data['nohporangtua'] ?>" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>
                    <div class="px-4 pb-6 text-center rounded-b-xl flex justify-between items-center">
                        <div>
                            <button type="button" class="inline-flex justify-center rounded-md border border-transparent bg-gray-300 hover:bg-gray-400 active:bg-gray-500 py-2 w-32 text-sm font-semibold text-gray-800 shadow-sm transition-all" data-bs-dismiss="modal">Keluar</button>
                        </div>
                        <div>
                            <?php
                            if ($data['point'] > '50' && $data['point'] <= '70') {
                                echo '
                                <button type="button" class="inline-flex justify-center rounded-md border border-transparent bg-gray-300 hover:bg-gray-400 active:bg-gray-500 py-2 w-32 text-sm font-semibold text-gray-800 shadow-sm transition-all" data-bs-dismiss="modal">SP1</button>
                                ';
                            } elseif ($data['point'] > '30' && $data['point'] <= '50') {
                                echo '
                                <button type="button" class="inline-flex justify-center rounded-md border border-transparent bg-gray-300 hover:bg-gray-400 active:bg-gray-500 py-2 w-32 text-sm font-semibold text-gray-800 shadow-sm transition-all" data-bs-dismiss="modal">SP2</button>
                                ';
                            } elseif ($data['point'] <= '30') {
                                echo '
                                <button type="button" class="inline-flex justify-center rounded-md border border-transparent bg-gray-300 hover:bg-gray-400 active:bg-gray-500 py-2 w-32 text-sm font-semibold text-gray-800 shadow-sm transition-all" data-bs-dismiss="modal">SP3</button>
                                ';
                            }
                            ?>

                        </div>
                        <div>
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-yellow-500 hover:bg-yellow-600 active:bg-yellow-700 py-2 w-32 text-sm font-semibold text-yellow-900 shadow-sm transition-all" name="bresetpasswordsiswa">Reset Password</button>
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-yellow-500 hover:bg-yellow-600 active:bg-yellow-700 py-2 w-32 text-sm font-semibold text-yellow-900 shadow-sm transition-all" name="bubahsiswa">Perbarui Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>