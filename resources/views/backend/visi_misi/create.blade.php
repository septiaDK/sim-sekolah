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
                    <form action="{{ route('visi_misi.store') }}" method="POST">   
                        @method('POST')
                        @csrf

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="visi">
                                    Visi
                                </label>
                                <input type="text" id="visi" name="visi" placeholder="Ketik visi di sini" class="border border-gray-300 shadow p-3 w-full rounded mb-" value="{{ old('visi') }}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="misi">
                                    Misi
                                </label>
                                <textarea name="misi" id="misi" class="ckeditor shadow form-textarea mt-1 block w-full border rounded border-gray-300 p-3 py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" rows="5" placeholder="Ketik Misi di sini">{{ old('misi') }}</textarea>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="tujuan">
                                    Tujuan
                                </label>
                                <textarea name="tujuan" id="tujuan" class="ckeditor shadow form-textarea mt-1 block w-full border rounded border-gray-300 p-3 py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" rows="5" placeholder="Ketik tujuan di sini">{{ old('tujuan') }}</textarea>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="btn bg-green-600 hover:bg-green-800 btn-sm mt-5">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
