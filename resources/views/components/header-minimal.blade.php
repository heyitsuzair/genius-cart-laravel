<nav class="bg-white w-full z-10">
    <x-search-form />
    <header class="py-3 px-12 border-b border-gray-300 flex justify-between items-center">
        <x-text-base class="text-gray-500">
            <a href="tel:0310 4864150">0310 4864150</a>
        </x-text-base>
        <div class="right flex items-center gap-2">
            <div class="border-r-2 border-black pr-2">
                <x-currency-switch />
            </div>
            <div>
                <x-button-full-rounded class="py-1 px-6 text-white bg-black" href="/">
                    Login
                </x-button-full-rounded>
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
                        <li class="{{ $currentRoute == $nav['title'] ? 'border-b-2 border-gray-700' : '' }}">
                            <a href="{{ $nav['link'] }}"
                                class="block py-2 text-gray-700 text-sm
                            p-0 text-gray"
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
            <x-icon-circle class="w-14 h-14 cursor-pointer relative" :badge="true" :badgeValue="2" id="wishlist">
                fa-regular fa-heart text-md
            </x-icon-circle>
            <x-icon-circle class="w-14 h-14 cursor-pointer relative" :badge="true" :badgeValue="10" id="cart">
                fa-solid fa-basket-shopping text-md
            </x-icon-circle>
        </div>
    </header>
</nav>