<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-center">
                    <div class="w-3/4">
                        <div class="flex justify-end mb-5">
                            @if (isset($identitas_sekolah))
                                <a href="{{ route('identitas_sekolah.edit', [$identitas_sekolah->id]) }}"
                                    class="btn bg-blue-600 hover:bg-blue-800 btn-sm">Ubah</a>
                            @else
                                <a href="{{ route('identitas_sekolah.create') }}"
                                    class="btn bg-green-600 hover:bg-green-800 btn-sm">Tambah</a>
                            @endif
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table w-full border-separate border border-slate-400">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center font-bold text-lg">Identitas Sekolah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="border border-slate-300" width="30%">Nama Sekolah</th>
                                        <td class="border border-slate-300">{{ $identitas_sekolah->nama_sekolah ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300">NPSN</th>
                                        <td class="border border-slate-300">{{ $identitas_sekolah->npsn ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300">Status</th>
                                        <td class="border border-slate-300">{{ strtoupper($identitas_sekolah->status) ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300">Bentuk Pendidikan</th>
                                        <td class="border border-slate-300">{{ strtoupper($identitas_sekolah->bentuk_pendidikan) ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300">SK Pendirian Sekolah</th>
                                        <td class="border border-slate-300">{{ $identitas_sekolah->sk_berdiri ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300">Tanggal SK Pendirian</th>
                                        <td class="border border-slate-300">{{ date('d/m/Y', strtotime($identitas_sekolah->tgl_sk_berdiri)) ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300">SK Izin Operasional</th>
                                        <td class="border border-slate-300">{{ $identitas_sekolah->sk_operasional ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300">Tanggal SK Izin Operasional</th>
                                        <td class="border border-slate-300">{{ date('d/m/Y', strtotime($identitas_sekolah->tgl_sk_operasional)) ?? ' '}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table w-full border-separate border border-slate-400 mt-10">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center font-bold text-lg">Kontak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="border border-slate-300" width="30%">Alamat</th>
                                        <td class="border border-slate-300">{{ $identitas_sekolah->alamat ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300">RT/RW</th>
                                        <td class="border border-slate-300">{{ $identitas_sekolah->rt_rw ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300">Desa/Kelurahan</th>
                                        <td class="border border-slate-300">{{ $identitas_sekolah->kelurahan ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300">Kecamatan</th>
                                        <td class="border border-slate-300">{{ $identitas_sekolah->kecamatan ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300">Kabupaten</th>
                                        <td class="border border-slate-300">{{ $identitas_sekolah->kabupaten ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300">Provinsi</th>
                                        <td class="border border-slate-300">{{ $identitas_sekolah->provinsi ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300">Kode Pos</th>
                                        <td class="border border-slate-300">{{ $identitas_sekolah->kode_pos ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300">Lintang</th>
                                        <td class="border border-slate-300">{{ $identitas_sekolah->lintang ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300">Bujur</th>
                                        <td class="border border-slate-300">{{ $identitas_sekolah->bujur ?? '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h1 class="text-2xl font-bold mt-10">Sejarah : </h1>
                            <div class="flex justify-start p-2">
                                {!! $identitas_sekolah->sejarah ?? 'Masih kosong !' !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
