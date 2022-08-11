<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX Datatable
            var dataTable = $('#crudTable').DataTable({
                ajax: {
                    url: "{!! url()->current() !!}"
                },
                columns: [
                    { data:'DT_RowIndex', name: 'DT_RowIndex', width: '5%' },
                    { data: 'nama', name: 'nama' },
                    { data: 'nip', name: 'nip' },
                    { data: 'status', name: 'status' },
                    {
                        data: 'photo',
                        name: 'photo',
                        orderable: 'false',
                        searchable: 'false',
                        width: '15%',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: 'false',
                        searchable: 'false',
                        width: '15%',
                        className: "text-center"
                    }
                ],
            });
        </script>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('tenaga_pendidik.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded shadow-lg">+ Tambah Tenaga Pendidik / Staff</a>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table class="w-full table-auto" id="crudTable">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th class="text-base">No</th>
                                <th class="text-base">Nama</th>
                                <th class="text-base">NIP</th>
                                <th class="text-base">Status</th>
                                <th class="text-base">Photo</th>
                                <th class="text-center w-1/4 text-base">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>