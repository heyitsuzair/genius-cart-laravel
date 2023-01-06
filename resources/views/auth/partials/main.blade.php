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
@endphp

<div class="flex gap-4">
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
