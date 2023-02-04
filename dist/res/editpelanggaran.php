<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modalUbah<?= $data['idpelanggaran'] ?>" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-clip-padding rounded-md outline-none text-current">
            <form method="POST" action="./res/aksi_crud.php" enctype="multipart/form-data">
                <input type="hidden" name="tidpelanggaran" value="<?= $data['idpelanggaran'] ?>">
                <div class="modal-body relative bg-white/90 border rounded-xl backdrop-blur-sm shadow-none">
                    <div class="px-4 py-5">
                        <div class="grid grid-cols-8 grid-flow-row 2xl:gap-6 gap-3 text-left align-bottom">

                            <div class="col-span-5">
                                <label for="namapelanggaran" class="block text-sm font-medium text-gray-700 ">Nama Pelanggaran</label>
                                <input required maxlength="25" type="text" name="tnamapelanggaran" id="namapelanggaran" autocomplete="full-name" value="<?= $data['namapelanggaran'] ?>" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div class="col-span-3">
                                <label for="point" class="block text-sm font-medium text-gray-700 ">Pengurangan Point</label>
                                <input required maxlength="25" type="number" name="tpoint" id="point" autocomplete="full-name" value="<?= $data['point'] ?>" class="text-slate-900 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
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