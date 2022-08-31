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
                <form class="w-full" action="{{ route('ekstrakurikuler.store') }}" method="POST">
                    @method('POST')
                    @csrf

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label for="nama"
                                class="block uppercase tracking-wide text-gray-800 text-xs font-bold mb-2">Nama
                                Ekstrakurikuler</label>
                            <input type="text" name="nama" placeholder="Ketik nama di sini"
                                class="appearance-none block w-full text-gray-800 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="nama" value="{{ old('nama') }}" />
                        </div>
                    </div>

                    <div class="flex flex-wrap -m-3 mb-6">
                        <div class="w-full px-3 text-right">
                            <a href="{{ route('ekstrakurikuler') }}" class="kembali h-10 px-5 text-red-600 trasition-colors duration-150 border border-red-600 rounded-lg focus:shadow-outline hover:bg-red-600 hover:text-red-100 py-2 px-4 mx-3">Kembali</a>

                            <button type="submit"
                                class="shadow-lg bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Simpan
                                Ekstrakurikuler</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
