<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $page }}</title>
    @vite('resources/css/app.css')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- JQUERY --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>

    <nav class="bg-white border-gray-200 dark:bg-gray-900 sticky top-0 z-50">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                <p class="text-green-600 self-center text-2xl font-semibold whitespace-nowrap dark:text-white"><i
                        class="pr-4 fa-brands fa-shopify text-3xl"></i>Go-Shop</p>
            </a>
            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                <a href="tel:5541251234" class="text-sm  text-gray-500 dark:text-white hover:underline">(555)
                    412-1234</a>
                <a href="{{ route('login') }}"><button
                        type="button"
                        class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Login</button></a>
            </div>
        </div>
    </nav>
    <nav class="bg-gray-100 dark:bg-gray-700">
        <div class="max-w-screen-xl px-4 py-2 mx-auto">
            <div class="flex items-center">
                <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-xs">
                    <li>
                        <a href="#" class="text-gray-500 dark:text-white hover:underline">Promo</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-500 dark:text-white hover:underline">Tentang kami</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-500 dark:text-white hover:underline">Pengaduan</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-500 dark:text-white hover:underline">Berita</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    @vite('resources/js/app.js')
</body>

</html>
