<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="mb-5" role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        Ada Kesalahan !
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <p>
                            <ul class="list-disc px-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
            @endif
            <div>
                <form action="{{ route('identitas_sekolah.store') }}" method="POST">
                    @method('POST')
                    @csrf

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-800 text-xs font-bold mb-2"
                                for="nama_sekolah">
                                Nama Sekolah
                            </label>
                            <input type="text" id="nama_sekolah" name="nama_sekolah"
                                placeholder="Ketik nama sekolah di sini"
                                class="appearance-none block w-full text-gray-800 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                value="{{ old('nama_sekolah') }}">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-1/2 px-3">
                            <span class="inline-block"></span>
                            <label class="block uppercase tracking-wide text-gray-800 text-xs font-bold mb-2"
                                for="sk_berdiri">
                                SK Berdiri
                            </label>
                            <input type="text" id="sk_berdiri" name="sk_berdiri"
                                placeholder="Ketik SK di sini"
                                class="appearance-none block w-full text-gray-800 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                value="{{ old('sk_berdiri') }}">
                        </div>
                        <div class="w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-800 text-xs font-bold mb-2"
                                for="tgl_sk_berdiri">
                                Tanggal SK Berdiri
                            </label>
                            <span class="font-base inline-block text-xs text-red-600">Format : Hari/Bulan/Tahun</span>
                            <input type="date" id="tgl_sk_berdiri" name="tgl_sk_berdiri"
                                placeholder=""
                                class="appearance-none block w-full text-gray-800 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                value="{{ old('tgl_sk_berdiri') }}">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-800 text-xs font-bold mb-2"
                                for="sejarah_singkat">
                                Sejarah Singkat
                            </label>
                            <textarea name="sejarah_singkat" id="sejarah_singkat"
                                class="ckeditor"
                                rows="5" placeholder="">{{ old('sejarah_singkat') }}</textarea>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-800 text-xs font-bold mb-2"
                                for="latitude">
                                Latitude
                            </label>
                            <input type="text" id="latitude" name="latitude"
                                placeholder="Ketik Latitude di sini"
                                class="appearance-none block w-full text-gray-800 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                value="{{ old('latitude') }}">
                        </div>
                        <div class="w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-800 text-xs font-bold mb-2"
                                for="longitude">
                                Longitude
                            </label>
                            <input type="text" id="longitude" name="longitude"
                                placeholder="Ketik Longitude di sini"
                                class="appearance-none block w-full text-gray-800 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                value="{{ old('longitude') }}">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-800 text-xs font-bold mb-2"
                                for="struktur_organisasi">
                                Foto Struktur Organisasi
                            </label>
                            <span class="font-base inline-block text-xs text-red-600">Format : .jpg / .png /
                                .jpeg</span>
                            <input type="file" id="struktur_organisasi" name="struktur_organisasi"
                                placeholder=""
                                class="appearance-none block w-full text-gray-800 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                value="">
                        </div>
                    </div>

                    <div class="flex flex-wrap -m-3 mb-6">
                        <div class="w-full px-3 text-right">
                            <a href="{{ route('identitas_sekolah') }}" class="kembali h-10 px-5 text-red-600 transition-colors duration-150 border border-red-500 rounded-lg focus:shadow-outline hover:bg-red-600 hover:text-red-100 py-2 px-4 mx-3">Kembali</a>

                            <button type="submit" class="shadow-lg bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Simpan Identitas Sekolah</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
