@php
    use App\Models\Product;
    function get_product($id)
    {
        return Product::findOrFail($id);
    }
@endphp


<div class="text-right mb-10">
    <select id="status" name="status"
        class="block text-gray-900 w-full border-gray-300 rounded-md bg-gray-100 text-sm focus:ring-blue-500 focus:border-blue-500 p-2.5 anchor-select">
        <option value="" {{ Request::get('status') ? '' : 'selected' }}>Filter By Status</option>
        <option value="processing"
            {{ Request::get('status') && Request::get('status') == 'processing' ? 'selected' : '' }}>
            Processing</option>
        <option value="completed"
            {{ Request::get('status') && Request::get('status') == 'completed' ? 'selected' : '' }}>
            Completed</option>
    </select>

</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50">
                    Items
                </th>
                <th scope="col" class="px-6 py-3">
                    Method
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50">
                    Customer Info
                </th>
                <th scope="col" class="px-6 py-3">
                    Country
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50">
                    Total (PKR)
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3  bg-gray-50">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @unless(count($orders) < 1)
                @php
                    $i = 0;
                @endphp
                @foreach ($orders as $order)
                    @php
                        $i++;
                    @endphp
                    <tr class="border-b border-gray-200">
                        <td class="px-6 py-4 font-bold">
                            {{ $i }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 bg-gray-50">
                            @if (count(json_decode($order->order_items)) > 0)
                                @foreach (json_decode($order->order_items) as $key => $value)
                                    @php
                                        $product = get_product($key);
                                    @endphp
                                    {{ $product->title . ' x ' }} <strong class="text-black">{{ $value->quantity }}</strong>
                                @endforeach
                            @else
                                <p>Order Items No Longer Available</p>
                            @endif

                        </th>
                        <td class="px-6 py-4">
                            {{ $order->payment_method }}
                        </td>
                        <td class="px-6 py-4 bg-gray-50">
                            <span><strong class="text-black">Name:</strong> {{ $order->name }}</span>
                            <span><strong class="text-black">Email:</strong> <a class="underline"
                                    href="mailto:{{ $order->email }}">{{ $order->email }}</a></span>
                            <span><strong class="text-black">Address:</strong> {{ $order->address }}</span>
                            <span><strong class="text-black">Contact:</strong> <a href="tel:{{ $order->contact }}"
                                    class="underline">{{ $order->contact }}</a></span>
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->country }}
                        </td>
                        <td class="px-6 py-4 bg-gray-50">
                            {{ $order->total }}
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="text-white py-1 px-2 text-sm rounded-full {{ $order->status == 'processing' ? 'bg-yellow-500' : 'bg-green-500' }} capitalize">{{ $order->status }}<span>
                        </td>

                        <td class="px-6 py-4 flex items-start gap-4 bg-gray-50">
                            <form action="/orders/{{ $order->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="border-green-500 bg-green-500 open-edit-modal rounded-full text-white flex items-center justify-center w-8 h-8 transitiion-all hover:bg-green-700 border-green-700">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>


                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="py-3 text-center" colspan="12">No Orders Found</td>
                </tr>
            @endunless


        </tbody>
    </table>
</div>
<div class="mt-10">
    {{ $orders->links() }}
</div>
