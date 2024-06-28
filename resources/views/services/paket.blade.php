@extends('templates.main')

@section('content')
    <main class="max-w-screen-xl mx-auto mt-6">
        {{-- Banner --}}
        <section class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <div class=" duration-700 ease-in-out">
                <img src="https://news.codashop.com/id/wp-content/uploads/sites/4/2021/06/Banner-Web-Codashop-June-Promo-Peng.Baru_.jpg"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </section>
        {{-- End Banner --}}
        {{-- Service --}}
        <section>
            <h2 class="mt-10 text-2xl font-bold text-gray-800">Beli Paket Data</h2>
            <form class="mt-6" action="{{ route('payment') }}" method="post">
                @method('POST')
                @csrf
                <div class="relative">
                    <span class="absolute start-0 bottom-3 text-gray-500 dark:text-gray-400">
                        <svg class="w-4 h-4 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 19 18">
                            <path
                                d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                        </svg>
                    </span>
                    <input type="text" id="floating-phone-number" name="phone_number" onkeyup="checkNumber(this)"
                        class="block py-2.5 ps-6 pe-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        placeholder=" " />
                    <label for="floating-phone-number"
                        class="absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:start-6 peer-focus:start-0 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nomor
                        telepon</label>
                </div>
                <p id="message" class="mt-2 text-sm text-red-500"></p>
                <input id="selected-price" name="selected_price" type="text" value="0" hidden>
                <div id="container-price" class="mt-4 grid grid-cols-2 md:grid-cols-4 xl:grid-cols-6 gap-y-4 gap-x-6"></div>
                <br>
                <div class="flex justify-end">
                    <button type="submit" id="submit-price" disabled
                        class="disabled:bg-gray-400 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 me-2 mb-2">Beli</button>
                </div>
                <br>
                <br>
                <br>
            </form>

        </section>
        {{-- End Service --}}
    </main>
    <script>
        function checkNumber(element) {
            if (isNaN(element.value)) {
                $("#message").empty();
                $("#message").append("Nomor harus berupa angka");
            } else if (element.value.length <= 3) {
                $("#message").empty();
                $("#message").append("Nomor harus lebih dari 3 digit");
            } else
            if (element.value[0] != 0 && element.value[1] != 8) {
                $("#message").empty();
                $("#message").append("Format nomormu salah!");
            } else {
                $("#message").empty();
                displayPrice();
            }
            $("#container-price").empty();
        }

        function displayPrice() {
            $.ajax({
                type: "get",
                url: "http://127.0.0.1:3000/data_packets",
                dataType: "json",
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#container-price").append(
                            '<div id="' + value.id +
                            '" class="border border-gray-300 px-4 py-6 rounded-md" onclick="selectedPrice(\'' +
                            value.id + '\')">' +
                            '<p class="text-sm text-center text-gray-800">' + value.description +
                            '</p>' +
                            '<p class="text-sm text-center text-gray-600">' + formattedNumber
                            .format(value.price) + '</p>' +
                            '</div>'
                        );
                    });
                }
            });
        }

        function selectedPrice(id) {
            var oldId = $("#selected-price").val();
            $("#container-price #" + oldId).removeClass("border-green-600");

            if (oldId == id) {
                $("#selected-price").val('0');
                // set button disabled
                $("#submit-price").prop('disabled', true);
                return null;
            }
            $("#selected-price").val(id);
            $("#container-price #" + id).addClass("border-green-600");

            // set button enabled
            $("#submit-price").prop('disabled', false);
        }

        const formattedNumber = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        })
    </script>
@endsection
