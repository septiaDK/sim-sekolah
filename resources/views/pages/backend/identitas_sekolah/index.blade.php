<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                @if ($identitas_sekolah)
                    <a class="inline-block bg-gray-600 text-white px-2 py-2 rounded-md focus:outline-none focus:shadow-outline"
                        href="{{ route('identitas_sekolah.edit', $identitas_sekolah->id) }}">Edit Identitas Sekolah</a>
                @else
                    <a class="inline-block bg-green-600 text-white px-2 py-2 rounded-md focus:outline-none focus:shadow-outline"
                        href="{{ route('identitas_sekolah.create') }}">Tambah Identitas Sekolah</a>
                @endif
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <tbody>
                                <tr>
                                    <th
                                        class="w-1/4 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Nama Sekolah
                                    </th>
                                    <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $identitas_sekolah->nama_sekolah ?? '' }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th
                                        class="w-1/4 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        SK Berdiri
                                    </th>
                                    <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $identitas_sekolah->sk_berdiri ?? '' }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th
                                        class="w-1/4 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Tanggal SK Berdiri
                                    </th>
                                    <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            @if (isset($identitas_sekolah->tgl_sk_berdiri))
                                                {{ date('d/m/Y', strtotime($identitas_sekolah->tgl_sk_berdiri)) }}
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th
                                        class="w-1/4 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Sejarah Singkat
                                    </th>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {!! $identitas_sekolah->sejarah_singkat ?? '' !!}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th
                                        class="w-1/4 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Latitute
                                    </th>
                                    <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $identitas_sekolah->latitude ?? '' }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th
                                        class="w-1/4 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Longitute
                                    </th>
                                    <td class="px-3 py-3 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $identitas_sekolah->longitude ?? '' }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th
                                        class="w-1/4 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Struktur Organisasi
                                    </th>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if ($identitas_sekolah->struktur_organisasi != null)
                                            <span class="font-base inline-block text-xs text-red-600 mb-5">Silahkan klik gambar untuk melihat resolusi lebih besar !</span>

                                            <a href="{{ url(Storage::url($identitas_sekolah->struktur_organisasi)) }}" data-lightbox="image-Struktur-Organisasi">
                                                <img src="{{ url(Storage::url($identitas_sekolah->struktur_organisasi)) }}"
                                                    alt="photo struktur organisasi" class="w-48 h-48 rounded-lg">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
