<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    @vite('resources/css/app.css')

    <style>
        .bg-image {
            background-image: url({{ asset('assets/login-school.jpg') }});
        }

        .backdrop {
            backdrop-filter: blur(2px);
        }
    </style>
</head>

<body>
    <div class="h-screen w-full flex justify-center items-center bg-gradient-to-tr from-blue-900 to-blue-500">
        <div class="bg-image w-full sm:w-1/2 md:w-9/12 lg:w-1/2 mx-3 md:mx-5 lg:mx-0 shadow-md flex flex-col md:flex-row items-center rounded z-10 overflow-hidden bg-center bg-cover bg-blue-600">
            <div class="w-full md:w-1/2 flex flex-col justify-center items-center bg-opacity-25 bg-blue-600 backdrop">
                <h1 class="text-3xl md:text-4xl font-extrabold text-white my-2 md:my-0">
                    SMK N 1 SUMBANG
                </h1>
                <p class="mb-2 text-white hidden md:block font-mono">
                    "bisa, bisa, bisa"
                </p>
            </div>
            <div class="w-full md:w-1/2 flex flex-col items-center bg-white py-5 md:py-8 px-4">
                <h3 class="mb-4 font-bold text-3xl flex items-center text-blue-500">
                    LOGIN
                </h3>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('login') }}" class="px-3 flex flex-col  w-full gap-3">
                    @csrf

                    <input type="email" name="email" placeholder="email..." value="{{ old('email') }}"
                        class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500 placeholder-opacity-50 focus:outline-none focus:border-blue-500"
                    >

                    <input type="password" name="password" placeholder="password..."
                        class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500 placeholder-opacity-50 focus:outline-none focus:border-blue-500"
                    >

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex justify-end items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-500 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <button class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white focus-outline-none focus:ring rounded px-3 py-1">
                        <svg 
                            class="w-5 h-5 inline" 
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24" 
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            stroke-width="2" 
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                            </path>
                        </svg>
                        <p class="ml-1 text-lg">
                            Login
                        </p>
                    </button>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
