@extends('templates.main')
@section('content')
    <main class="max-w-screen-xl mx-auto mt-6">
        @include('templates.modal')
        {{-- Carousel --}}
        <section>
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://d2v6npc8wmnkqk.cloudfront.net/storage/10041/conversions/header-banner-promo-gopay-transaksi-pertama-kali-x-Large-seo_image_large.jpg"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>  
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://alfamart.co.id/storage/page/December2020/prSEyVxe1aqQhju2onYt.jpg"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://alfamart.co.id/storage/page/October2020/znEX3BUZhbVMq3ONQCTF.jpg"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://alfamart.co.id/storage/page/September2020/Il4goFcQKt1Iwbw4xxH2.jpg"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://news.codashop.com/id/wp-content/uploads/sites/4/2021/06/Banner-Web-Codashop-June-Promo-Peng.Baru_.jpg"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-2 h-2 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                    <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 4"
                        data-carousel-slide-to="3"></button>
                    <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 5"
                        data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </section>
        {{-- End Carousel --}}
        {{-- Reminders --}}
        <section>
            <h2 class="mt-10 text-2xl font-bold text-gray-800">Beli lagi ini?</h2>
            <div class="mt-6 grid grid-cols-3">
                @foreach ($reminders as $reminder)
                    <div
                        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex gap-6 items-center">
                            <i class="text-4xl {{ $reminder['service'][0]['icon'] }}"></i>
                            <div>
                                <h5 class="text-xl font-bold tracking-tight text-gray-500 dark:text-white">
                                    {{ $reminder['service'][0]['name'] }}</h5>
                                <p class="font-normal text-sm text-gray-500 dark:text-gray-400">
                                    {{ $reminder['id_payment'] }} | @currency($reminder['price'])</p>
                            </div>
                        </div>
                        <div class="flex gap-6 items-center justify-between mt-1">
                            <p class="font-normal text-sm text-gray-500 dark:text-gray-400">{{ $reminder['description'] }}
                            </p>
                            <button data-modal-target="static-modal" data-modal-toggle="static-modal"
                                data-service-name="{{ $reminder['service'][0]['name'] }}"
                                data-id-payment="{{ $reminder['id_payment'] }}" data-price="{{ $reminder['price'] }}"
                                data-description="{{ $reminder['description'] }}"
                                data-id-data-packets="{{ $reminder['id_data_packets'] }}"
                                onclick="setDataModal(this)"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white min-w-max bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Bayar
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        {{-- End Reminders --}}
        {{-- Services --}}
        <section>
            <h2 class="mt-14 text-2xl font-bold text-gray-800">Layanan yang ada</h2>
            <div class="mt-6 grid grid-cols-5 gap-6 gap-y-10">
                @foreach ($services as $service)
                    @if ($service['slug'] == 'paket-data')
                        <a href="{{ route('service.' . $service['slug']) }}" class="flex gap-4 items-center">
                            <i class="text-3xl {{ $service['icon'] }}"></i>
                            <p class="text-gray-800">{{ $service['name'] }}</p>
                        </a>
                    @else
                        <a href="#" class="flex gap-4 items-center">
                            <i class="text-3xl {{ $service['icon'] }}"></i>
                            <p class="text-gray-800">{{ $service['name'] }}</p>
                        </a>
                    @endif
                @endforeach
            </div>
        </section>
        {{-- End Services --}}
        <br>
        <br>
        <br>
        <br>
        <br>
    </main>
    <script>
        function setDataModal(element) {
            var dataServiceName = $(element).data('service-name');
            var dataIdPayment = $(element).data('id-payment');
            var dataPrice = $(element).data('price');
            var dataDescription = $(element).data('description');
            var dataIdDataPackets = $(element).data('id-data-packets');
            // console.log(dataServiceName);
            $("#modal-title").text(dataServiceName);
            $("#modal-text-1").text(dataIdPayment + " | " + dataPrice);
            $("#modal-text-2").text(dataDescription);

            $("#selected-price").val(dataIdDataPackets);
            $("#phone-number").val(dataIdPayment);
        }
    </script>
@endsection
