<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 1 Sumbang</title>
    @vite('resources/css/app.css')

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon.png') }}">
</head>

<body class="bg-gray-100">
    <nav class="fixed top-0 left-0 bg-white w-full shadow">
        <div class="container m-auto flex justify-between items-center text-gray-700">
            <div class="pl-8 py-4">
                <img src="{{ asset('assets/favicon.png') }}" alt="logo sekolah" class="w-10">
            </div>
            <ul class="hidden md:flex items-center pr-10 text-base font-semibold cursor-pointer">
                <li class="hover:bg-gray-200 py-4 px-6">Beranda</li>
                <li class="hover:bg-gray-200 py-4 px-6">Visi Misi</li>
                <li class="hover:bg-gray-200 py-4 px-6">Profil</li>
                <li class="hover:bg-gray-200 py-4 px-6">Gallery</li>
                <li class="hover:bg-gray-200 py-4 px-6">Postingan</li>
            </ul>
            <button class="block md:hidden py-3 px-4 mx-2 rounded focus:outline-none hover:bg-gray-200 group">
                <div class="absolute top-0 -right-full h-screen w-8/12 bg-white border transform opacity-0 group-focus:right-0 group-focus:opacity-100 transition-all duration-300">
                    <ul class="flex flex-col items-center w-full text-base cursor-pointer pt-10">
                        <li class="hover:bg-gray-200 py-4 px-6 w-full">Beranda</li>
                        <li class="hover:bg-gray-200 py-4 px-6 w-full">Visi Misi</li>
                        <li class="hover:bg-gray-200 py-4 px-6 w-full">Profil</li>
                        <li class="hover:bg-gray-200 py-4 px-6 w-full">Gallery</li>
                        <li class="hover:bg-gray-200 py-4 px-6 w-full">Postingan</li>
                    </ul>
                </div>
            </button>
        </div>
    </nav>
    <section class="mt-20 px-4">
        <p class="mb-2">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error odio harum blanditiis inventore maiores dignissimos velit eos eaque ad labore. Pariatur sunt nobis rerum nesciunt quod asperiores sit, ducimus eum voluptatem ad officia autem! Nisi, non voluptatum nobis debitis quisquam consectetur velit magni. Deserunt quod quam tempore iusto esse sapiente perspiciatis voluptate aliquid aperiam fuga, soluta minima, eius praesentium laboriosam obcaecati rerum? Delectus dolorem labore velit sint mollitia possimus numquam voluptatibus distinctio, soluta iusto, voluptas similique ex officia rerum. Iste, laboriosam in. Unde, deleniti rerum. Obcaecati enim odit tempore assumenda fugiat, repellendus, nulla inventore autem error ducimus molestiae doloribus, nesciunt maiores architecto quo facere tempora aliquam nihil. Quo hic, repellat magni in maiores eveniet ad quae perferendis voluptatem non ratione nihil aut sapiente, aliquam officiis repudiandae quam alias distinctio cupiditate. Recusandae esse reprehenderit nisi dolore ducimus quo tempore officiis debitis voluptas iure cupiditate exercitationem est libero sed deleniti magnam quibusdam sit numquam, hic quidem vitae adipisci mollitia reiciendis ipsum? Consequuntur hic quibusdam praesentium vero. Nam, facilis blanditiis aut impedit fuga doloribus ducimus quo minus debitis neque id libero alias deserunt, unde, provident voluptatem odio minima similique cum maiores saepe. Sint nulla adipisci molestias ut est hic rem necessitatibus totam asperiores.
        </p>
    </section>
</body>

</html>
