@php
    use App\Models\Order;
    $total_orders = Order::where('status', 'processing')->count();
@endphp


<aside class="" aria-label="Sidebar">
    <div class="px-3 py-4 rounded shadow-lg">
        <ul class="space-y-2">
            <li>
                <a href="?route=index"
                    class="flex items-center p-2 text-base font-normal  rounded-lg {{ Request::get('route') == 'index' ? 'bg-black text-white' : 'hover:bg-gray-100 text-gray-900' }}">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="?route=orders"
                    class="flex items-center p-2 text-base font-normal rounded-lg {{ Request::get('route') == 'orders' ? 'bg-black text-white' : 'hover:bg-gray-100 text-gray-900' }}">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                        </path>
                        <path
                            d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                        </path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Orders</span>
                    <span
                        class="flex items-center justify-center w-6 h-6 text-sm font-medium text-blue-600 bg-blue-200 rounded-full">{{ $total_orders }}</span>
                </a>
            </li>

            <li>
                <a href="?route=products"
                    class="flex items-center p-2 text-base font-normal rounded-lg {{ Request::get('route') == 'products' ? 'bg-black text-white' : 'hover:bg-gray-100 text-gray-900' }}">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Products</span>
                </a>
            </li>
            <li>
                <a href="?route=categories"
                    class="flex items-center p-2 text-base font-normal rounded-lg {{ Request::get('route') == 'categories' ? 'bg-black text-white' : 'hover:bg-gray-100 text-gray-900' }}">
                    <i class="fa fa-tag text-xl ml-1 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Categories</span>
                </a>
            </li>
            <li>
                <a href="?route=submissions"
                    class="flex items-center p-2 text-base font-normal rounded-lg {{ Request::get('route') == 'submissions' ? 'bg-black text-white' : 'hover:bg-gray-100 text-gray-900' }}">
                    <i class="fa fa-paper-plane text-xl ml-1 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Submissions</span>
                </a>
            </li>
            <li>
                <a href="/logout"
                    class="flex items-center p-2 text-base font-normal rounded-lg hover:bg-gray-100 text-gray-900">
                    <i class="fa fa-sign-out text-xl ml-1 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
