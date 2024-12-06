<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/@phosphor-icons/web@2.1.1/src/bold/style.css"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>UP TREND</title>
</head>

<body>
    @include('customer.navbar')

    @if(session('success'))
        <div class="flex justify-center items-center w-full fixed top-0 right-0 left-0 z-50 alert" id="success-alert">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white bg-opacity-90 rounded-lg shadow">
                    <button type="button" class="close absolute top-3 end-2.5 text-gray-500 hover:text-red-500" data-dismiss="alert" onclick="closeAlert()">
                        <i class="ph-bold ph-x"></i>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <h3 class="mt-5 mb-5 text-lg font-normal text-green-500">{{ session('success') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(session('info'))
        <div class="flex justify-center items-center w-full fixed top-0 right-0 left-0 z-50 alert" id="info-alert">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white bg-opacity-90 rounded-lg shadow">
                    <button type="button" class="close absolute top-3 end-2.5 text-gray-500 hover:text-red-500" data-dismiss="alert" onclick="closeAlert()">
                        <i class="ph-bold ph-x"></i>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <h3 class="mt-5 mb-5 text-lg font-normal text-green-500">{{ session('info') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <section class="py-8 md:py-16">
        <div class="max-w-screen-lg px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-5 group">

                <div class="col-span-3 shrink-0 max-w-md lg:max-w-lg mx-auto grid grid-cols-5 gap-4">
                    <div class="col-span-1 flex flex-col gap-2">
                        <img src="{{ URL('product/' . $product->image1) }}" alt="" class="object-cover size-24 hover-image rounded-md hover-image">
                        <img src="{{ URL('product/' . $product->image2) }}" alt="" class="object-cover size-24 hover-image rounded-md hover-image">
                        <img src="{{ URL('product/' . $product->image3) }}" alt="" class="object-cover size-24 hover-image rounded-md hover-image">
                    </div>
                    <div class="col-span-4">
                        <img src="{{ URL('product/' . $product->image1) }}" alt="" class="object-cover hover-image rounded-md main-image">
                    </div>
                </div>

                <div class="col-span-2 mt-6 sm:mt-8 lg:mt-0">
                    <p class="text-2xl font-bold sm:text-3xl ">{{ $product->product_title }}</p>

                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <h1 class="text-lg font-semibold sm:text-xl">₱{{ number_format($product->price, 2) }}</h1>
                    </div>

                    <div>
                        <p class="text-base font-bold sm:text-xl mt-10">Select Size</p>
                        <div class="mt-6 sm:mt-8 grid grid-cols-2 gap-1">
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 11 / W 12.5">US M 11 / W 12.5</button>
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 10.5 / W 12">US M 10.5 / W 12</button>
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 10 / W 11.5">US M 10 / W 11.5</button>
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 9.5 / W 11">US M 9.5 / W 11</button>
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 9 / W 10.5">US M 9 / W 10.5</button>
                            <button class="border-2 hover:border-black py-2 px-4 rounded-md text-lg size-btn" data-size="US M 8.5 / W 10">US M 8.5 / W 10</button>
                        </div>
                    </div>

                    <!-- Quantity controls -->
                    <div class="mt-6 sm:mt-8">
                        <p class="text-base font-bold sm:text-xl">Quantity</p>
                        <div class="flex items-center mt-4">
                            <button type="button" class="py-2 px-4 border-2" id="decrease-quantity">-</button>
                            <input type="number" id="quantity" name="quantity" value="1" class="mx-2 w-12 text-center border-2" min="1">
                            <button type="button" class="py-2 px-4 border-2" id="increase-quantity">+</button>
                        </div>
                    </div>

                    <div class="grid grid-cols-5 gap-2">
                        <form class="mt-6 gap-2 sm:items-center grid col-span-4 sm:mt-8" action="{{ url('add_cart', $product->id) }}" method="POST">
                            @csrf
                            <!-- Size -->
                            <input type="hidden" name="size" id="selected-size" value="">
                            <!-- Hidden input for selected image (dynamic) -->
                            <input type="hidden" name="selected_image" id="selected-image" value="{{ URL('product/' . $product->image1) }}">
                            <!-- Quantity -->
                            <input type="hidden" name="quantity" id="hidden-quantity" value="1">
                            <!-- Add to Cart Button -->
                            <button type="submit" class="flex items-center justify-center py-2.5 text-sm sm:text-lg font-medium rounded-lg bg-black text-white">
                                <i class="ph-bold ph-bag mr-2"></i>
                                Add to bag
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Handle size selection
        const sizeButtons = document.querySelectorAll('.size-btn');
        const selectedSizeInput = document.getElementById('selected-size');
        const selectedImageInput = document.getElementById('selected-image');
        const quantityInput = document.getElementById('quantity');
        const hiddenQuantityInput = document.getElementById('hidden-quantity');

        sizeButtons.forEach(button => {
            button.addEventListener('click', function() {
                sizeButtons.forEach(btn => btn.classList.remove('bg-gray-200'));
                this.classList.add('bg-gray-200');
                selectedSizeInput.value = this.getAttribute('data-size');
            });
        });

        // Quantity increase/decrease
        document.getElementById('increase-quantity').addEventListener('click', function() {
            quantityInput.value = parseInt(quantityInput.value) + 1;
            hiddenQuantityInput.value = quantityInput.value;
        });

        document.getElementById('decrease-quantity').addEventListener('click', function() {
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
                hiddenQuantityInput.value = quantityInput.value;
            }
        });

        // Sync quantity with hidden input
        quantityInput.addEventListener('input', function() {
            hiddenQuantityInput.value = quantityInput.value;
        });

        document.querySelectorAll('.hover-image').forEach(image => {
            image.addEventListener('click', function() {
                selectedImageInput.value = this.src;
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const sizeButtons = document.querySelectorAll('.size-btn');
            const imageButtons = document.querySelectorAll('.hover-image');

            let sizeSelected = false;
            let imageSelected = false;

            sizeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    sizeButtons.forEach(btn => btn.classList.remove('bg-gray-200'));
                    this.classList.add('bg-gray-200');
                    selectedSizeInput.value = this.getAttribute('data-size');
                    sizeSelected = true;
                });
            });

            imageButtons.forEach(image => {
                image.addEventListener('click', function() {
                    selectedImageInput.value = this.src;
                    imageSelected = true;
                });
            });
        });

function closeAlert() {
    const alert = document.querySelector('[data-dismiss="alert"]').closest('.flex');
    alert.style.display = 'none';
}

function closeAlert() {
            const alert = document.querySelector('[data-dismiss="alert"]').closest('.flex');
            alert.style.transition = 'opacity 0.5s ease-out';
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.style.display = 'none';
            }, 500);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const successAlert = document.getElementById('success-alert');
            const infoAlert = document.getElementById('info-alert');

            if (successAlert) {
                setTimeout(() => {
                    successAlert.style.transition = 'opacity 1s';
                    successAlert.style.opacity = '0';
                    setTimeout(function () {
                        successAlert.style.display = 'none';
                    }, 1000);
                }, 3000);
            }

            if (infoAlert) {
                setTimeout(() => {
                    infoAlert.style.transition = 'opacity 1s';
                    infoAlert.style.opacity = '0';
                    setTimeout(function () {
                        infoAlert.style.display = 'none';
                    }, 500);
                }, 3000);
            }
        });
    </script>
</body>

<script defer src="{{ URL::asset('js/main.js') }}"></script>
</html>
