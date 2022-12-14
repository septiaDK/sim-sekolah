<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
        <link href="{{ url('vendor/lightbox2-2.11.3/dist/css/lightbox.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.css') }}"
        integrity="sha512-UiVP2uTd2EwFRqPM4IzVXuSFAzw+Vo84jxICHVbOA1VZFUyr4a6giD9O3uvGPFIuB2p3iTnfDVLnkdY7D/SJJQ=="
        crossorigin="anonymous" />
        <style>
            /*Form fields*/
            .dataTables_wrapper select,
            .dataTables_wrapper .dataTables_filter input {
                color: #4a5568; 			/*text-gray-700*/
                padding-left: 1rem; 		/*pl-4*/
                padding-right: 1rem; 		/*pl-4*/
                padding-top: .5rem; 		/*pl-2*/
                padding-bottom: .5rem; 		/*pl-2*/
                line-height: 1.25; 			/*leading-tight*/
                border-width: 2px; 			/*border-2*/
                border-radius: .25rem; 		
                border-color: #edf2f7; 		/*border-gray-200*/
                background-color: #edf2f7; 	/*bg-gray-200*/
            }
            /*Row Hover*/
            table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
                background-color: #ebf4ff;	/*bg-indigo-100*/
            }
            /*Pagination Buttons*/
            .dataTables_wrapper .dataTables_paginate .paginate_button		{
                font-weight: 700;				/*font-bold*/
                border-radius: .25rem;			/*rounded*/
                border: 1px solid transparent;	/*border border-transparent*/
            }
            /*Pagination Buttons - Current selected */
            .dataTables_wrapper .dataTables_paginate .paginate_button.current	{
                color: #fff !important;				/*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); 	/*shadow*/
                font-weight: 700;					/*font-bold*/
                border-radius: .25rem;				/*rounded*/
                background: #667eea !important;		/*bg-indigo-500*/
                border: 1px solid transparent;		/*border border-transparent*/
            }
            /*Pagination Buttons - Hover */
            .dataTables_wrapper .dataTables_paginate .paginate_button:hover		{
                color: #fff !important;				/*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);	 /*shadow*/
                font-weight: 700;					/*font-bold*/
                border-radius: .25rem;				/*rounded*/
                background: #667eea !important;		/*bg-indigo-500*/
                border: 1px solid transparent;		/*border border-transparent*/
            }
            /*Add padding to bottom border */
            table.dataTable.no-footer {
                border-bottom: 1px solid #e2e8f0;	/*border-b-1 border-gray-300*/
                margin-top: 0.75rem;
                margin-bottom: 0.75rem;
            }
            /*Change colour of responsive icon*/
            table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
                background-color: #667eea !important; /*bg-indigo-500*/
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{ url('vendor/lightbox2-2.11.3/dist/js/lightbox.js') }}"></script>
        {{-- <script src="{{ asset('assets/lightbox2-2.11.3/distjs/lightbox-plus-jquery.min.js') }}"></script> --}}

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        {{ $script ?? '' }}
        <script>

            // event sweet alert kembali
            $(document).on('click', '.kembali', function (e) {
                e.preventDefault();
                const href = $(this).attr('href');
                swal({
                    title: 'Apakah anda yakin?',
                    text: `Data tidak akan di simpan`,
                    icon: 'warning',
                    buttons: ["Cancel", "Ya, kembali !"],
                }).then(function(value) {
                    if (value) {
                        window.location.href=href;
                    }
                });
            });

            // event sweet alert hapus
            $(document).on('click', '.hapus', function (e) {
                const form =  $(this).closest("form")
                const nama = $(this).data('nama');
                e.preventDefault();
                swal({
                    title: 'Apakah anda yakin?',
                    text: `Data ${nama} akan dihapus`,
                    icon: 'warning',
                    buttons: ["Cancel", "Ya, hapus !"],
                }).then(function(value) {
                    if (value) {
                        form.submit();
                    }
                });
            });
        </script>

        @if (session('success'))
            <script>
                swal({
                    icon: 'success',
                    title: "Berhasil",
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        @endif

        @if (session('error'))
            <script>
                swal({
                    icon: 'error',
                    title: "Gagal",
                    text: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        @endif

        <script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
        <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}"></script>
        <script src="{{ url('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js') }}" defer></script>
        <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js') }}"
            integrity="sha512-UU0D/t+4/SgJpOeBYkY+lG16MaNF8aqmermRIz8dlmQhOlBnw6iQrnt4Ijty513WB3w+q4JO75IX03lDj6qQNA=="
            crossorigin="anonymous"></script>
        <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/dragscroll/0.0.8/dragscroll.min.js') }}"
            integrity="sha512-/ncZdOhQm5pgj5KHy720Ck7XF5RzYK6rtUsLNnGcitXrKT3wUYzTrPlOSG7SdL2kDzkuLEOFvrQRyllcZkeAlg=="
            crossorigin="anonymous"></script>
    </body>
</html>
