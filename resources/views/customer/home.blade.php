<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css'); }}">
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/@phosphor-icons/web@2.1.1/src/bold/style.css"/>
        <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>UP TREND</title>
    </head>

    <body>
    @include('customer.navbar')
    
    <div class="mb-5 sm:mb-10 lg:mb-20 relative">
        <div class="bg-cover">
            <img class="" src="{{ URL('images/general/streetcropped.jpg') }}"alt=""/>
        </div>
        <div class="flex absolute inset-0 justify-center items-center space-x-3">
            <img class="w-[100px]" src="{{ asset('logos/uptrendnobg.png') }}" alt="Logo">
        </div>
    </div>

    
    <div class="mt-10 sm:mt-20">
            <div class="flex justify-center items-center flex-col">
                <p class="font-bold text-2xl sm:font-extrabold sm:text-6xl mb-2">KEEP UP WITH THE TREND</p>
                <p class="mb-6">Elevate your look with UP Trend.</p>
                <button class="bg-black text-white font-medium px-3 py-1 rounded-3xl">Shop Now</button>
            </div>
    </div>

    <div class="p-20 sm:p-20">
    <div>
        <p class="font-semibold text-2xl sm:font-medium sm:text-2xl sm:mb-6">See What's New</p>
    </div>
        <div class="flex justify-center">

            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($products as $prod)

                <div class="flex flex-col">
                    <div class="h-[600px] items-center justify-center">
                    <a href="{{url('product_details', $prod->id)}}" class="h-full w-full">
                        <img src="{{ URL('product/' . $prod->image1) }}" alt="" class="object-cover h-full w-full">
                    </a>
                    </div>
                    <div class="py-4">
                        <p class="font-semibold">{{ $prod->product_title }}</p>
                        <div class="">
                            <p class="text-gray-500">₱{{ number_format($prod->price, 2) }}</p>
                        </div>

                    </div>
                </div>
            @endforeach
                
        </div>
    </div>
    </body>
</html>