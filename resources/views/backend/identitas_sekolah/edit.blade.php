<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('identitas_sekolah.update', [$identitas_sekolah->id]) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="nama_sekolah">
                                    Nama Sekolah
                                </label>
                                <input type="text" id="nama_sekolah" name="nama_sekolah"
                                    placeholder="Ketik nama sekolah di sini"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-"
                                    value="{{ $identitas_sekolah->nama_sekolah ?? '' }}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="npsn">
                                    NPSN
                                </label>
                                <input type="text" id="npsn" name="npsn" placeholder="Ketik npsn di sini"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-"
                                    value="{{ $identitas_sekolah->npsn ?? '' }}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="status">
                                    Status
                                </label>
                                <select class="appearance-none w-full py-1 px-2 bg-white" name="status"
                                    id="status">
                                    <option value="" disabled selected>--Pilih--</option>
                                    <option value="negeri" @selected($identitas_sekolah->status == "negeri")>Negeri</option>
                                    <option value="swasta" @selected($identitas_sekolah->status == "swasta")>Swasta</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="bentuk_pendidikan">
                                    Bentuk Pendidikan
                                </label>
                                <select class="appearance-none w-full py-1 px-2 bg-white" name="bentuk_pendidikan"
                                    id="bentuk_pendidikan">
                                    <option value="" disabled selected>--Pilih--</option>
                                    <option value="SMA" @selected($identitas_sekolah->bentuk_pendidikan == "SMA")>SMA</option>
                                    <option value="SMK" @selected($identitas_sekolah->bentuk_pendidikan == "SMK")>SMK</option>
                                    <option value="MA" @selected($identitas_sekolah->bentuk_pendidikan == "MA")>MA</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="sk_berdiri">
                                    SK Berdiri
                                </label>
                                <input type="text" id="sk_berdiri" name="sk_berdiri" placeholder="Ketik sk berdiri di sini"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-"
                                    value="{{ $identitas_sekolah->sk_berdiri ?? '' }}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="tgl_sk_berdiri">
                                    Tanggal SK Berdiri
                                </label>
                                <input type="date" id="tgl_sk_berdiri" name="tgl_sk_berdiri" placeholder=""
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-"
                                    value="{{ $identitas_sekolah->tgl_sk_berdiri ?? null }}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="sk_operasional">
                                    SK Izin Operasional
                                </label>
                                <input type="text" id="sk_operasional" name="sk_operasional" placeholder="Ketik sk izin opersional di sini"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-"
                                    value="{{ $identitas_sekolah->sk_operasional ?? '' }}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="tgl_sk_operasional">
                                    Tanggal SK Izin Operasional
                                </label>
                                <input type="date" id="tgl_sk_operasional" name="tgl_sk_operasional" placeholder=""
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-"
                                    value="{{ $identitas_sekolah->tgl_sk_operasional ?? '' }}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="alamat">
                                    Alamat
                                </label>
                                <textarea name="alamat" id="alamat" class="shadow form-textarea mt-1 block w-full border rounded border-gray-300 p-3 py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" rows="5" placeholder="Ketik alamat di sini">{{ $identitas_sekolah->alamat ?? '' }}</textarea>

                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="rt_rw">
                                    RT/RW
                                </label>
                                <input type="text" id="rt_rw" name="rt_rw" placeholder="Ketik rt/rw di sini"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-"
                                    value="{{ $identitas_sekolah->rt_rw ?? '' }}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="kelurahan">
                                    Kelurahan
                                </label>
                                <input type="text" id="kelurahan" name="kelurahan" placeholder="Ketik kelurahan di sini"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-"
                                    value="{{ $identitas_sekolah->kelurahan ?? '' }}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="kecamatan">
                                    Kecamatan
                                </label>
                                <input type="text" id="kecamatan" name="kecamatan" placeholder="Ketik kecamatan di sini"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-"
                                    value="{{ $identitas_sekolah->kecamatan ?? '' }}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="kabupaten">
                                    Kabupaten
                                </label>
                                <input type="text" id="kabupaten" name="kabupaten" placeholder="Ketik kabupaten di sini"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-"
                                    value="{{ $identitas_sekolah->kabupaten ?? '' }}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="provinsi">
                                    Provinsi
                                </label>
                                <input type="text" id="provinsi" name="provinsi" placeholder="Ketik provinsi di sini"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-"
                                    value="{{ $identitas_sekolah->provinsi ?? '' }}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="kode_pos">
                                    Kode Pos
                                </label>
                                <input type="text" id="kode_pos" name="kode_pos" placeholder="Ketik kode pos di sini"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-"
                                    value="{{ $identitas_sekolah->kode_pos ?? '' }}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="lintang">
                                    Lintang
                                </label>
                                <input type="text" id="lintang" name="lintang" placeholder="Ketik lintang di sini"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-"
                                    value="{{ $identitas_sekolah->lintang ?? '' }}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="bujur">
                                    Bujur
                                </label>
                                <input type="text" id="bujur" name="bujur" placeholder="Ketik bujur di sini"
                                    class="border border-gray-300 shadow p-3 w-full rounded mb-"
                                    value="{{ $identitas_sekolah->bujur ?? '' }}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="sejarah">
                                    Sejarah
                                </label>
                                <textarea name="sejarah" id="sejarah" class="ckeditor shadow form-textarea mt-1 block w-full border rounded border-gray-300 p-3 py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" rows="5" placeholder="Ketik sejarah di sini">{{ $identitas_sekolah->sejarah ?? '' }}</textarea>

                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="btn bg-blue-600 hover:bg-blue-800 btn-sm mt-5">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
