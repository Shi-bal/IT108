
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
    @include('admin.navbar')

    <div class="">

        <div class="">
        <div class="">
        

    <div class="p-4 sm:ml-64">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left">
                <thead class="uppercase">
                    <tr class="border-2">
                        <th scope="col" class="px-6 py-3">Product Title</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="px-6 py-3">Quantity</th>
                        <th scope="col" class="px-6 py-3">Price</th>
                        <th scope="col" class="px-6 py-3 text-center">Image 1</th>
                        <th scope="col" class="px-6 py-3 text-center">Image 2</th>
                        <th scope="col" class="px-6 py-3 text-center">Image 3</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $product)
                    <tr class="border-b text-black">
                        <td class="px-6 py-4">{{$product->product_title}}</td>
                        <td class="px-6 py-4">{{$product->description}}</td>
                        <td class="px-6 py-4">{{$product->quantity}}</td>
                        <td class="px-6 py-4">₱{{$product->price}}</td>
                        <td class="px-6 py-4">
                            <img class="" src="/product/{{$product->image1}}">
                        </td>
                        <td class="px-6 py-4">
                            <img class="" src="/product/{{$product->image2}}">
                        </td>
                        <td class="px-6 py-4">
                            <img class="" src="/product/{{$product->image3}}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        </div>
        </div>
    </div>
    </body>
</html>
