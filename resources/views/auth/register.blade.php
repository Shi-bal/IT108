<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css'); }}">
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/@phosphor-icons/web@2.1.1/src/bold/style.css"/>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>UP TREND</title>
    </head>

<x-guest-layout>
    <div class="sticky top-0 z-10">
        <nav class="w-full sm:flex justify-between p-2 sm:p-4 lg:px-32 md:px-20 sm:px-14 items-center bg-white shadow-md">
            <div class="flex justify-center">
                <a href="/"><img class="w-[20px] md:w-[40px]" src="{{ asset('logos/uptrend.png') }}" alt="Logo"></a>
            </div>
                    
            <div class="absolute sm:static collapse sm:visible">
                <div class="space-x-4">
                    <!-- User Icon with Dropdown -->
                    <div class="relative inline-block group">
                        <!-- Trigger button with User Icon -->
                        <button class="inline-flex items-center justify-center focus:outline-none">
                            <i class="ph-bold ph-user"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition-all duration-200">
                            <div class="py-1" role="menu" aria-orientation="vertical">
                                <a href="/login" class="font-semibold block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Login</a>
                                <a href="/register" class="font-semibold block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Register</a>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>

        </nav>
    </div>

    <div class="flex flex-col w-full md:w-1/2 xl:w-2/5 2xl:w-2/5 3xl:w-1/3 mx-auto p-8 md:p-10 2xl:p-12 3xl:p-14 mt-20 rounded-2xl shadow-xl">
        <div class="flex flex-row gap-3 pb-4">
            <div class="flex justify-center w-full">
                <img class="invert" src="{{ asset('logos/uptrendnobg.png') }}" width="50" alt="Logo">
            </div>
        </div>

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}" class="flex flex-col">
            @csrf
            <div class="pb-2">
                <label for="name" class="block mb-2 text-sm font-medium text-[#111827]">Name</label>
                <div class="relative text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"><i class="ph-bold ph-user"></i></span>
                    <input type="text" name="name" id="name" class="pl-12 mb-2 bg-gray-50 text-gray-600 border border-gray-300 sm:text-sm rounded-lg focus:ring-1 focus:ring-gray-400 block w-full p-2.5" placeholder="Your Name" required autofocus autocomplete="name">
                </div>
            </div>
            
            <div class="pb-2">
                <label for="email" class="block mb-2 text-sm font-medium text-[#111827]">Email</label>
                <div class="relative text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"><i class="ph-bold ph-envelope-simple"></i></span>
                    <input type="email" name="email" id="email" class="pl-12 mb-2 bg-gray-50 text-gray-600 border border-gray-300 sm:text-sm rounded-lg focus:ring-1 focus:ring-gray-400 block w-full p-2.5" placeholder="Email Address" required autocomplete="username">
                </div>
            </div>

            <div class="pb-2">
                <label for="phone" class="block mb-2 text-sm font-medium text-[#111827]">Phone</label>
                <div class="relative text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"><i class="ph-bold ph-phone"></i></span>
                    <input type="phone" name="phone" id="phone" class="pl-12 mb-2 bg-gray-50 text-gray-600 border border-gray-300 sm:text-sm rounded-lg focus:ring-1 focus:ring-gray-400 block w-full p-2.5" placeholder="Phone number" required autocomplete="username">
                </div>
            </div>
            <div class="pb-2">
                <label for="address" class="block mb-2 text-sm font-medium text-[#111827]">Address</label>
                <div class="relative text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"><i class="ph-bold ph-house-line"></i></i></span>
                    <input type="address" name="address" id="address" class="pl-12 mb-2 bg-gray-50 text-gray-600 border border-gray-300 sm:text-sm rounded-lg focus:ring-1 focus:ring-gray-400 block w-full p-2.5" placeholder="Address" required autocomplete="username">
                </div>
            </div>
            
            <div class="pb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-[#111827]">Password</label>
                <div class="relative text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"><i class="ph-bold ph-key"></i></span>
                    <input type="password" name="password" id="password" class="pl-12 mb-2 bg-gray-50 text-gray-600 border border-gray-300 sm:text-sm rounded-lg focus:ring-1 focus:ring-gray-400 block w-full p-2.5" placeholder="••••••••••" required autocomplete="new-password">
                </div>
            </div>

            <div class="pb-6">
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-[#111827]">Confirm Password</label>
                <div class="relative text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"><i class="ph-bold ph-key"></i></span>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="pl-12 mb-2 bg-gray-50 text-gray-600 border border-gray-300 sm:text-sm rounded-lg focus:ring-1 focus:ring-gray-400 block w-full p-2.5" placeholder="••••••••••" required autocomplete="new-password">
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <div class="flex items-center">
                    <input type="checkbox" name="terms" id="terms" class="form-checkbox">
                    <label for="terms" class="ms-2 text-sm text-gray-600">I agree to the <a href="{{ route('terms.show') }}" class="underline hover:text-gray-900">Terms of Service</a> and <a href="{{ route('policy.show') }}" class="underline hover:text-gray-900">Privacy Policy</a></label>
                </div>
            </div>
            @endif

            <button type="submit" class="w-full text-white bg-black focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-6">Sign Up</button>
            
            <div class="text-sm font-light text-[#6B7280] flex justify-center">
                Already have an account?<a href="{{ route('login') }}" class="font-medium text-red-600 hover:text-red-900 underline ml-1">Login</a>
            </div>
        </form>

        <!-- OR separator -->
        <div class="relative flex py-8 items-center">
            <div class="flex-grow border-t border-[1px] border-gray-200"></div>
            <span class="flex-shrink mx-4 font-medium text-gray-500">OR</span>
            <div class="flex-grow border-t border-[1px] border-gray-200"></div>
        </div>

        <!-- Social Logins -->
        <form>
            <div class="flex flex-row gap-2 justify-center">
                <button class="flex flex-row w-32 gap-2 bg-black p-2 rounded-md text-gray-200">
                    <i class="ph-bold ph-google-logo mx-auto"></i>
                    <span class="font-medium mx-auto">Google</span>
                </button>
                <button class="flex flex-row w-32 gap-2 bg-black p-2 rounded-md text-gray-200">
                    <i class="ph-bold ph-github-logo mx-auto"></i>
                    <span class="font-medium mx-auto">Twitter</span>
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
