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
                    <form action="{{ route('visi_misi.update', [$visi_misi->id]) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-password">
                                    Visi
                                </label>
                                <input type="text" id="visi" name="visi" placeholder="Ketik visi di sini" class="border border-gray-300 shadow p-3 w-full rounded mb-" value="{{ $visi_misi->visi ?? '' }}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-password">
                                    Misi
                                </label>
                                <textarea name="misi" class="ckeditor shadow form-textarea mt-1 block w-full border rounded border-gray-300 p-3 py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" rows="5" placeholder="Ketik Misi di sini">{{ $visi_misi->misi ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-password">
                                    Tujuan
                                </label>
                                <textarea name="tujuan" class="ckeditor shadow form-textarea mt-1 block w-full border rounded border-gray-300 p-3 py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" rows="5" placeholder="Ketik tujuan di sini">{{ $visi_misi->tujuan ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="btn bg-green-600 hover:bg-green-800 btn-sm">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
