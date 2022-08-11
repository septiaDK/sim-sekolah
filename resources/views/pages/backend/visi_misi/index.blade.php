<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                @if ($visi_misi)
                    <a class="inline-block bg-gray-600 text-white px-2 py-2 rounded-md focus:outline-none focus:shadow-outline"
                        href="{{ route('visi_misi.edit', $visi_misi->id) }}">
                        Edit Visi Misi
                    </a>
                @else
                    <a class="inline-block bg-green-600 text-white px-2 py-2 rounded-md focus:outline-none focus:shadow-outline"
                        href="{{ route('visi_misi.create') }}">
                        Tambah Visi Misi
                    </a>
                @endif
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <tbody>
                                <tr>
                                    <th
                                        class="w-1/4 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider text-center">
                                        Visi
                                    </th>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $visi_misi->visi ?? '' }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th
                                        class="w-1/4 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider text-center">
                                        Misi
                                    </th>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{!! $visi_misi->misi ?? '' !!}</p>
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
