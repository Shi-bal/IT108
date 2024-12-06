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

<div class="p-4 sm:ml-64">
<div class="">
        <div class="">

            @if(session()->has('message'))
                <div class="flex justify-center items-center w-full fixed top-0 right-0 left-0 z-50">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white bg-opacity-90 rounded-lg shadow">
                            <button type="button" class="close absolute top-3 end-2.5 text-gray-500 hover:text-red-500 " data-dismiss="alert" onclick="closeAlert()">
                                <i class="ph-bold ph-x"></i>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <h3 class="mt-5 mb-5 text-lg font-normal text-green-500">{{ session()->get('message') }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
                


            <div class="flex justify-center items-center w-full">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 border-2 rounded-lg sm:p-5">
            
                        <!-- Modal body -->
                        <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                <div>
                                    <label for="product_title" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                                    <input type="text" name="product_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product name" required="">
                                </div>
                                <div>
                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                                    <input type="number" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="₱0.00" required="">
                                </div>
                                <div>
                                    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 ">Quantity</label>
                                    <input type="number" name="quantity" min="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="0" required="">
                                </div>
                                
                                <div class="sm:col-span-2">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                    <textarea name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 " placeholder="Write product description here"></textarea>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <label class="font-medium text-gray-900">Product Image 1:</label>
                                    <input type="file" name="image1" required>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <label class="font-medium text-gray-900">Product Image 2:</label>
                                    <input type="file" name="image2" required>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <label class="font-medium text-gray-900">Product Image 3:</label>
                                    <input type="file" name="image3" required>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <button type="submit" value="Add Product" class="text-white inline-flex items-center font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-black">
                                    <i class="ph-bold ph-plus mr-2"></i>
                                    Add new product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const button = document.querySelector('[data-drawer-toggle="default-sidebar"]');
    const sidebar = document.getElementById('default-sidebar');
    const dashboardLink = document.getElementById('dashboard-link');

    button.addEventListener('click', function () {
        sidebar.classList.toggle('-translate-x-full');
    });

    dashboardLink.addEventListener('click', function () {
        sidebar.classList.add('-translate-x-full');
    });

    const alert = document.querySelector('[data-dismiss="alert"]').closest('.flex');
    if (alert) {
        setTimeout(function () {
            alert.style.transition = 'opacity 1s';
            alert.style.opacity = '0';
            setTimeout(function () {
                alert.style.display = 'none';
            }, 1000);
        }, 3000);
    }
});

function closeAlert() {
    const alert = document.querySelector('[data-dismiss="alert"]').closest('.flex');
    alert.style.display = 'none';
}
</script>

    </body>
</html>