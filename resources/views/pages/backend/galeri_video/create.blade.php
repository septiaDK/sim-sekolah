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
                <form class="w-full" action="{{ route('galeri_video.store') }}" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <input type="hidden" name="jenis" value="video">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label for="judul"
                                class="block uppercase tracking-wide text-gray-800 text-xs font-bold mb-2">Judul</label>
                            <input type="text" name="judul" placeholder="Ketik judul di sini"
                                class="appearance-none block w-full text-gray-800 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="judul" value="{{ old('judul') }}" />
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label for="keterangan"
                                class="block uppercase tracking-wide text-gray-800 text-xs font-bold mb-2">Keterangan</label>
                            <textarea name="keterangan" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Ketik keterangan di sini">{{ old('keterangan') }}</textarea>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-800 text-xs font-bold mb-2"
                                for="path_link">
                                Video 
                            </label>
                            <span class="font-base inline-block text-xs text-red-600">Silahkan video di upload di youtube, setelah itu link taruh di form disini</span>
                                <input type="text" name="path_link" placeholder="Taruh link youtube di sini"
                                class="appearance-none block w-full text-gray-800 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="path_link" value="{{ old('path_link') }}" />
                        </div>
                    </div>

                    <div class="flex flex-wrap -m-3 mb-6">
                        <div class="w-full px-3 text-right">
                            <a href="{{ route('galeri_video') }}" class="kembali h-10 px-5 text-red-600 trasition-colors duration-150 border border-red-600 rounded-lg focus:shadow-outline hover:bg-red-600 hover:text-red-100 py-2 px-4 mx-3">Kembali</a>

                            <button type="submit"
                                class="shadow-lg bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Simpan Video</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
