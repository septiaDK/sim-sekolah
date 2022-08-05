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
                    <div class="w-full">
                        <h4 class="font-bold text-2xl">Visi</h4>
                        <p class="pt-2">{{ $visi_misi->visi ?? 'Masih Kosong !' }}</p>
                    </div>
                    <div class="w-full mt-10">
                        <h4 class="font-bold text-2xl">Misi</h4>
                        {!! $visi_misi->misi ?? 'Masih Kosong !' !!}
                    </div>
                    <div class="w-full mt-10">
                        <h4 class="font-bold text-2xl">Tujuan</h4>
                        {{ $visi_misi->tujuan ?? 'Masih Kosong !' }}
                    </div>
                    <div class="w-full mt-10 flex justify-end">
                        @if (isset($visi_misi))
                            <a href="{{ route('visi_misi.edit', [$visi_misi->id]) }}"
                            class="btn bg-blue-600 hover:bg-blue-800 btn-sm">Ubah</a>
                        @else
                            <a href="{{ route('visi_misi.create') }}"
                            class="btn bg-green-600 hover:bg-green-800 btn-sm">Tambah</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
