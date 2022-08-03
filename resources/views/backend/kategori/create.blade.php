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
                    <div class="overflow-x-auto">
                        <form action="{{ route('kategori.store') }}" method="POST">
                            @csrf
                            @method('POST')

                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="label-text">Nama Kategori</span>
                                </label>
                                <input type="text" name="nama" placeholder="Ketik di sini"
                                    class="input input-bordered w-full max-w-xs" />
                            </div>

                            <button type="submit" class="btn bg-green-600 btn-sm mt-5">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
