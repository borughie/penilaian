                        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modalHapusJurusan<?= $data['idjurusan'] ?>" tabindex="-1" aria-modal="true" role="dialog">
                            <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
                                <div class="modal-content border-none relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                    <div class="modal-header flex flex-shrink-0 items-center justify-center pt-8 border-gray-200 rounded-t-md" style="backdrop-filter: blur(4px);">
                                        <div class="inline-block p-4 bg-red-50 rounded-full">
                                            <svg class="w-16 h-16 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                <path d="M12 5.99L19.53 19H4.47L12 5.99M12 2L1 21h22L12 2zm1 14h-2v2h2v-2zm0-6h-2v4h2v-4z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <form method="POST" action="./res/aksi_crud.php">
                                        <input type="hidden" name="tidjurusan" value="<?= $data['idjurusan'] ?>">
                                        <div class="modal-body relative">
                                            <div class="px-4 pb-3 sm:p-6">
                                                <h5 class="text-center font-semibold text-slate-900">Apakah anda yakin akan menghapus data ini? <br>
                                                    <input type="text" class="hidden" name="idjurusan" value="<?= $data['idjurusan'] ?>">
                                                    <span class="font-extrabold text-transparent text-lg bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600"><?= $data['namajurusan'] ?></span>
                                                </h5>
                                            </div>
                                            <div class="px-4 pb-5 text-center mx-auto sm:px-6 rounded-b-md">
                                                <button type="button" class="inline-flex justify-center rounded-md border border-transparent bg-gray-300 hover:bg-gray-400 active:bg-gray-500 py-2 w-32 text-sm font-semibold text-gray-800 shadow-sm transition-all" data-bs-dismiss="modal">Keluar</button>
                                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-red-600/80 hover:bg-red-700/80 py-2 w-32 text-sm font-semibold text-white shadow-sm transition-all" name="bhapusjurusan">Hapus</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>