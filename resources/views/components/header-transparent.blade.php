<nav class="absolute top-0 hidden lg:block w-full z-10">
    <x-search-form />
    <header class="py-3 px-4 sm:px-12 border-b border-gray-300 flex justify-between items-center">
        <x-text-base class="text-gray-500">
            <a href="tel:0310 4864150">0310 4864150</a>
        </x-text-base>
        <div class="right flex items-center gap-2">
            <div class="border-r-2 border-black pr-2">
                <x-currency-switch />
            </div>
            <div>
                @auth
                    <x-button-full-rounded class="py-1
            px-6 text-white bg-black" href="/logout">
                        Logout
                    </x-button-full-rounded>
                    <x-button-full-rounded class="py-1 ml-2
            px-6 text-white bg-black"
                        href="/dashboard?route=index">
                        Dashboard
                    </x-button-full-rounded>
                @else
                    <x-button-full-rounded class="py-1
                    px-6 text-white bg-black" href="/login">
                        Admin
                    </x-button-full-rounded>
                @endauth
            </div>
        </div>
    </header>
    <header class="py-3 px-9 flex flex-col sm:flex-row items-center gap-7 justify-between">
        <div class="flex items-center">
            <div class="brand">
                <a href="/">
                    <img src="{{ asset('src/images/logo.png') }}" class="w-full" alt="Loading...">
                </a>
            </div>
            @php
                include app_path('includes/navigation/index.php');
                $currentRoute = Route::current()->getName();
            @endphp
            <div class="menu mx-20 hidden lg:block">
                <ul class="font-medium bg-inherit flex gap-7">
                    @foreach ($navMenu as $nav)
                        <li
                            class="{{ $currentRoute == $nav['title'] ? 'border-b-2 text-blue-500 border-blue-500' : 'text-gray-700' }} hover:text-blue-500 hover:border-b-2 hover:border-blue-500 transition">
                            <a href="{{ $nav['link'] }}" class="block py-2 text-sm
                            p-0"
                                aria-current="page">{{ $nav['title'] }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="flex gap-4">
            <x-icon-circle class="w-14 h-14 cursor-pointer relative" :badge="false" id="search">
                fa fa-search text-md
            </x-icon-circle>
            @php
                $ip = \Request::ip();
                
                $cart_count = session('cart') ? count(session('cart')) : 0;
                $wishlists_count = session('wishlist') ? count(session('wishlist')) : 0;
            @endphp
            <a href="/wishlist">
                <x-icon-circle class="w-14 h-14 cursor-pointer relative icon-badged" :badge="true" :badgeValue="$wishlists_count"
                    id="wishlist">
                    fa-regular fa-heart text-md
                </x-icon-circle>
            </a>
            <a href="/cart">
                <x-icon-circle class="w-14 h-14 cursor-pointer relative icon-badged" :badge="true" :badgeValue="$cart_count"
                    id="cart">
                    fa-solid fa-basket-shopping text-md
                </x-icon-circle>
            </a>
            <button type="button" data-drawer-target="drawer-backdrop" data-drawer-show="drawer-backdrop"
                data-drawer-placement="right" aria-controls="drawer-backdrop">
                <x-icon-circle class="lg:hidden w-14 h-14 cursor-pointer relative" :badge="false" id="cart">
                    fa-solid fa-bars text-md
                </x-icon-circle>
            </button>
        </div>
        <x-drawer />
    </header>
</nav>
