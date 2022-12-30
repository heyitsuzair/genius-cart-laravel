<!-- drawer component -->
<div id="drawer-backdrop"
    class="fixed z-40 translate-x-full lg:hidden h-screen p-4 overflow-y-auto bg-white w-80 dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-backdrop-label">
    <h5 id="drawer-backdrop-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu</h5>
    <button type="button" data-drawer-dismiss="drawer-backdrop" aria-controls="drawer-backdrop"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div class="py-4 overflow-y-auto">
        <ul class="space-y-2">
            @php
                include app_path('includes/navigation/index.php');
                $currentRoute = Route::current()->getName();
            @endphp
            @foreach ($navMenuMobile as $nav)
                <li>
                    <a href="{{ $nav['link'] }}"
                        class="flex {{ $nav['title'] === $currentRoute ? 'bg-black' : 'bg-white' }} items-center p-2 text-base font-normal text-gray-900 rounded-lg ">
                        <i class="fa fa-{{ $nav['icon'] }} {{ $nav['title'] === $currentRoute ? 'text-white' : 'text-black' }}"
                            aria-hidden="true"></i>
                        <span
                            class="ml-3 mt-0.5 {{ $nav['title'] === $currentRoute ? 'text-white' : 'text-black' }}">{{ $nav['title'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
