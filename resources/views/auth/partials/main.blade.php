@php
    use App\Models\Order;
    use AmrShawky\LaravelCurrency\Facade\Currency;
    
    function get_total()
    {
        $total_earnings = 0;
        $total = 0;
        /**
         * Get All Orders
         * */
        $orders = Order::all();
        foreach ($orders as $order) {
            $total_earnings += $order->total;
        }
    
        $total = Currency::convert()
            ->from('PKR')
            ->to(Session::get('currency') ?? 'PKR')
            ->amount($total_earnings)
            ->round(2)
            ->get();
    
        return $total;
    }
    function total_orders()
    {
        $count = Order::count();
    
        return $count;
    }
    function pending_orders()
    {
        $count = Order::where('status', 'pending')->count();
    
        return $count;
    }
@endphp

<div class="flex flex-col md:flex-row gap-4">
    <div class="bg-gray-100 w-full rounded-lg h-64 flex flex-col items-start px-5 justify-center gap-4">
        <div>
            <x-heading-3xl :divider="true">
                Account Information
            </x-heading-3xl>
        </div>
        <div>
            <strong class="text-black">
                Name:</strong> <span>{{ Auth::user()->name }}</span>
        </div>
        <div>
            <strong class="text-black">
                Email:</strong> <span>{{ Auth::user()->email }}</span>
        </div>
    </div>
    <div class="bg-gray-100 w-full rounded-lg h-64 flex flex-col items-start px-5 justify-center gap-14">
        <div>
            <x-heading-3xl :divider="true">
                Wallet
            </x-heading-3xl>
        </div>
        <div>
            <strong class="text-black">
                Total Earnings:</strong> <span> {{ session('currency') ?? 'PKR' }} {{ get_total() }}</span>
        </div>

    </div>
</div>

<div class="flex flex-col md:flex-row gap-4 mt-4">
    <div class="bg-gray-100 w-full rounded-lg h-80 flex flex-col items-center justify-center gap-4">
        <div class="border-blue-400 border-[0.7rem] rounded-full w-40 h-40 flex items-center justify-center">
            <h1 class="text-3xl font-semibold">{{ total_orders() }}</h1>
        </div>
        <a href="?route=orders" class="underline">
            <span class="text-black font-medium text-md">Total Orders</span>
        </a>
        <span class="text-sm">All The Time</span>
    </div>
    <div class="bg-gray-100 w-full rounded-lg h-80 flex flex-col items-center justify-center gap-4">
        <div class="border-yellow-400 border-[0.7rem] rounded-full w-40 h-40 flex items-center justify-center">
            <h1 class="text-3xl font-semibold">{{ pending_orders() }}</h1>
        </div>
        <a href="?route=orders" class="underline">
            <span class="text-black font-medium text-md">Pending Orders</span>
        </a>
        <span class="text-sm">All The Time</span>
    </div>
</div>
