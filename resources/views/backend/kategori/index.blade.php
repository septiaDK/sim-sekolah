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
                    <a href="{{ route('kategori.create') }}" class="btn bg-green-600 hover:bg-green-800 btn-sm">Tambah</a>

                    <form action="{{ route('kategori') }}">
                        <div class="flex justify-end">
                            <div class="form-control">
                                <div class="input-group">
                                    <input type="text" name="keyword" placeholder="Pencarian…"
                                        class="input input-bordered" value="{{ Request::get('keyword') }}" />
                                    <button type="submit" class="btn btn-square">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table table-zebra w-full mt-10">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th class="text-center w-10"></th>
                                <th class="text-base">Kategori</th>
                                <th class="text-center w-1/4 text-base">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kategoris as $key => $kategori)
                                <tr>
                                    <td></td>
                                    <td>{{ $kategori->nama }}</td>
                                    <td class="text-center w-1/4">
                                        {{-- button edit --}}
                                        <a href="{{ route('kategori.edit', [$kategori->id]) }}"
                                            class="btn bg-blue-600 hover:bg-blue-800 btn-sm">Ubah</a>
                                        <!-- button modal konfirm hapus -->
                                        <label for="my-modal-{{ $kategori->id }}"
                                            class="btn modal-button btn-sm bg-red-600 hover:bg-red-800">Hapus</label>

                                        <!-- modal konfirm hapus -->
                                        <input type="checkbox" id="my-modal-{{ $kategori->id }}" class="modal-toggle" />
                                        <div class="modal">
                                            <div class="modal-box relative">
                                                <label for="my-modal-{{ $kategori->id }}"
                                                    class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                                <h3 class="text-lg font-bold">Apakah Anda Yakin ?
                                                </h3>
                                                <p>Data akan dihapus.</p>
                                                <div class="modal-action">
                                                    <form action="{{ route('kategori.destroy', [$kategori->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm bg-red-600 hover:bg-red-800">Ya,
                                                            Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="3">No Data</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="p-3">
                        {{ $kategoris->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
