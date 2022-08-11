<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <form class="w-full" action="{{ route('visi_misi.store') }}" method="POST">
                    @method('POST')
                    @csrf

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-800 text-xs font-bold mb-2"
                                for="visi">
                                Visi
                            </label>
                            <input type="text" id="visi" name="visi" placeholder="Ketik visi di sini"
                                class="appearance-none block w-full text-gray-800 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="{{ old('visi') }}">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-800 text-xs font-bold mb-2"
                                for="misi">
                                Misi
                            </label>
                            <textarea name="misi" id="misi"
                                class="ckeditor"
                                rows="5" placeholder="Ketik Misi di sini">{{ old('misi') }}</textarea>
                        </div>
                    </div>

                    <div class="flex flex-wrap -m-3 mb-6">
                        <div class="w-full px-3 text-right">
                            <a href="{{ route('visi_misi') }}" class="kembali h-10 px-5 text-red-600 trasition-colors duration-150 border border-red-500 rounded-lg focus:shadow-outline hover:bg-red-600 hover:text-red-100 py-2 px-4 mx-3">Kembali</a>

                            <button type="submit" class="shadow-lg bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
