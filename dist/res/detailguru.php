<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modalUbah<?= $data['nip'] ?>" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-clip-padding rounded-md outline-none text-current">
            <form method="POST" action="./res/aksi_crud.php" enctype="multipart/form-data">
                <input type="hidden" name="tnip" value="<?= $data['nip'] ?>">
                <div class="modal-body relative bg-white/90 border rounded-xl backdrop-blur-sm shadow-none">
                    <div class="px-4 py-5">
                        <div class="grid grid-cols-8 grid-flow-row 2xl:gap-6 gap-3 text-left">

                            <div class="col-span-3 select-none">
                                <div class="bg-[#1512d4]/30 rounded-xl text-center p-2 font-semibold text-xl">NIP
                                    <div class="bg-[#1512d4]/70 rounded-xl py-1.5 text-white text-base"><?= $data['nip'] ?></div>
                                </div>
                            </div>

                            <div class="col-span-5">
                                <label for="namaguru" class="block text-sm font-medium text-gray-700 ">Nama Guru</label>
                                <input required maxlength="25" type="text" name="tnamaguru" id="namaguru" autocomplete="given-name" value="<?= $data['namaguru'] ?>" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div class="col-span-4">
                                <label for="walijurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                                <select required id="walijurusan" name="twalijurusan" class="text-slate-900 mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500">
                                    <option value="<?= $data['walijurusan'] ?>" <?= $data['walijurusan'] == "Akuntansi dan Keuangan Lembaga" ? 'selected' : '' ?>>Akuntansi dan Keuangan Lembaga</option>
                                    <option value="<?= $data['walijurusan'] ?>" <?= $data['walijurusan'] == "Manajemen Perkantoran dan Layanan Bisnis" ? 'selected' : '' ?>>Manajemen Perkantoran dan Layanan Bisnis</option>
                                    <option value="<?= $data['walijurusan'] ?>" <?= $data['walijurusan'] == "Pemasaran" ? 'selected' : '' ?>>Pemasaran</option>
                                    <option value="<?= $data['walijurusan'] ?>" <?= $data['walijurusan'] == "Usaha Layanan Pariwisata" ? 'selected' : '' ?>>Usaha Layanan Pariwisata</option>
                                    <option value="<?= $data['walijurusan'] ?>" <?= $data['walijurusan'] == "Perhotelan" ? 'selected' : '' ?>>Perhotelan</option>
                                    <option value="<?= $data['walijurusan'] ?>" <?= $data['walijurusan'] == "Kuliner" ? 'selected' : '' ?>>Kuliner</option>
                                    <option value="<?= $data['walijurusan'] ?>" <?= $data['walijurusan'] == "Seni dan Ekonomi Kreatif Busana" ? 'selected' : '' ?>>Seni dan Ekonomi Kreatif Busana</option>
                                </select>
                            </div>

                            <div class="col-span-1">
                                <label for="walikelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                                <select required id="walikelas" name="twalikelas" class="text-slate-900 mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500">
                                    z<option value="<?= $data['walikelas'] ?>" <?= $data['walikelas'] == "X" ? 'selected' : '' ?>>X</option>
                                    <option value="<?= $data['walikelas'] ?>" <?= $data['walikelas'] == "X - A" ? 'selected' : '' ?>>X - A</option>
                                    <option value="<?= $data['walikelas'] ?>" <?= $data['walikelas'] == "X - B" ? 'selected' : '' ?>>X - B</option>
                                    <option value="<?= $data['walikelas'] ?>" <?= $data['walikelas'] == "XI" ? 'selected' : '' ?>>XI</option>
                                    <option value="<?= $data['walikelas'] ?>" <?= $data['walikelas'] == "XI - A" ? 'selected' : '' ?>>XI - A</option>
                                    <option value="<?= $data['walikelas'] ?>" <?= $data['walikelas'] == "XI - B" ? 'selected' : '' ?>>XI - B</option>
                                    <option value="<?= $data['walikelas'] ?>" <?= $data['walikelas'] == "XII" ? 'selected' : '' ?>>XII</option>
                                    <option value="<?= $data['walikelas'] ?>" <?= $data['walikelas'] == "XII - A" ? 'selected' : '' ?>>XII - A</option>
                                    <option value="<?= $data['walikelas'] ?>" <?= $data['walikelas'] == "XII - B" ? 'selected' : '' ?>>XII - B</option>
                                </select>
                            </div>

                            <div class="col-span-3">
                                <label for="nohpguru" class="block text-sm font-medium text-gray-700">No Hp guru</label>
                                <input required maxlength="50" type="number" name="tnohpguru" id="nohpguru" value="<?= $data['nohpguru'] ?>" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div class="col-span-8">
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <textarea required type="text" rows="2" name="talamat" id="alamat" autocomplete="street-address" class="text-slate-900 mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"><?= $data['alamat'] ?></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="px-4 pb-6 text-center rounded-b-xl flex justify-between items-center">
                        <div>
                            <button type="button" class="inline-flex justify-center rounded-md border border-transparent bg-gray-300 hover:bg-gray-400 active:bg-gray-500 py-2 w-32 text-sm font-semibold text-gray-800 shadow-sm transition-all" data-bs-dismiss="modal">Keluar</button>
                        </div>
                        <!-- <div>
                            <button type="button" class="inline-flex justify-center rounded-md border border-transparent bg-gray-300 hover:bg-gray-400 active:bg-gray-500 py-2 w-32 text-sm font-semibold text-gray-800 shadow-sm transition-all" data-bs-dismiss="modal">SP1</button>
                            <button type="button" class="inline-flex justify-center rounded-md border border-transparent bg-gray-300 hover:bg-gray-400 active:bg-gray-500 py-2 w-32 text-sm font-semibold text-gray-800 shadow-sm transition-all" data-bs-dismiss="modal">SP2</button>
                            <button type="button" class="inline-flex justify-center rounded-md border border-transparent bg-gray-300 hover:bg-gray-400 active:bg-gray-500 py-2 w-32 text-sm font-semibold text-gray-800 shadow-sm transition-all" data-bs-dismiss="modal">SP3</button>
                        </div> -->
                        <div>
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-yellow-500 hover:bg-yellow-600 active:bg-yellow-700 py-2 w-32 text-sm font-semibold text-yellow-900 shadow-sm transition-all" name="bresetpasswordguru">Reset Password</button>
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-yellow-500 hover:bg-yellow-600 active:bg-yellow-700 py-2 w-32 text-sm font-semibold text-yellow-900 shadow-sm transition-all" name="bubahguru">Perbarui Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>