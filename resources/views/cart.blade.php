@section('title', 'Cart')

@section('nav')
    <x-header-minimal />
@endsection

@section('footer')
    <x-footer />
@endsection

<x-layout>
    @include('partials.breadcrumb', ['value' => Route::current()->getName()])

    <div class="container mx-auto mb-40 mt-10">
        <div class="mb-10">
            <x-heading-3xl :divider="true">
                Cart
            </x-heading-3xl>
        </div>
        <div class="grid grid-cols-12 gap-4 justify-center">
            <div class="col-span-9">
                <div class="relative overflow-x-auto shadow-md">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase border-b border-black bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Product Image
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sub Total
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @unless(count($products) < 1)
                                @foreach ($products as $product)
                                    @php
                                        $decoded_pictures = json_decode($product->pictures);
                                        $first_picture = $decoded_pictures[0];
                                    @endphp

                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img src="{{ $first_picture }}" alt="Loading..."
                                                class="w-full h-20 object-cover rounded-lg">
                                        </th>
                                        <td class="px-6 py-4">
                                            <a href="/product/{{ $product->id }}" class="underline">
                                                {{ substr($product->title, 0, 10) }}...
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ session('currency') ?? 'PKR' }} {{ $product->price }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ session('currency') ?? 'PKR' }}
                                            {{ intval($product->requested_quantity) * $product->price }}
                                        </td>
                                        <td class="px-6 py-4 mt-5 flex items-center justify-between gap-4">
                                            <form action="/product/add-to-cart" method="post">
                                                @csrf
                                                <div class="quantity gap-4 flex items-center">
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="prod_available_quantity"
                                                        value="{{ $product->quantity }}"
                                                        id="{{ $product->id . '-available-quantity' }}">
                                                    <button type="button"
                                                        class="btn-green w-[10%] h-[2.6rem] minus-product-cart border border-gray-300"
                                                        data-id={{ $product->id }}>
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                    <input type="number"
                                                        class="border-0 outline-0 focus:ring-0 text-center w-[20%] pl-0 xl:pl-3.5 border border-gray-300 pr-0 requested-quantity-{{ $product->id }}"
                                                        value="{{ intval($product->requested_quantity) }}" name="quantity"
                                                        readonly>
                                                    <input type="hidden" value="add" name="addition_type"
                                                        id="addition_type">
                                                    <button type="button"
                                                        class="btn-green w-[10%] h-[2.6rem] plus-product-cart border border-gray-300"
                                                        data-id={{ $product->id }}>
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>

                                                    <button type="submit" name="add-to-cart"
                                                        {{ $product->quantity < 1 ? 'disabled' : '' }}
                                                        class=" {{ $product->quantity < 1 ? 'disabled' : '' }} bg-blue-500 hover:bg-blue-700 text-white rounded-lg disabled:opacity-50 disabled:hover:bg-blue-500 py-2 w-1/2 sm:w-1/3 ml-3 transition-all"
                                                        id="{{ $product->id . '-add-to-cart' }}">
                                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                                    </button>
                                            </form>
                                            <form action="/product/{{ $product->id }}/remove-from-cart" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"><i
                                                        class="fa fa-xmark text-lg text-black font-bold"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td colspan="12" class="text-center  p-3">No Products Found In Cart</td>
                                </tr>
                            @endunless

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-span-3">
                <div class=" lg:sticky lg:top-24">


                    <aside class="shadow-md">
                        <div class="bg-gray-100 py-2 border-b border-black px-3">
                            <strong class="font-semibold">Cart Totals</strong>
                        </div>
                        <div class="py-4 border-b border-gray-300 gap-4 flex justify-between items-center px-3">
                            <span>Sub Total</span>
                            <strong class="font-semibold">
                                @php
                                    $total = 0;
                                    
                                    foreach ($products as $product) {
                                        $total += $product->price * intval($product->requested_quantity);
                                    }
                                @endphp
                                {{ session('currency') ?? 'PKR' }} {{ $total }}
                            </strong>
                        </div>
                        <div class="py-4 border-b border-gray-300 gap-4 flex justify-between items-center px-3">
                            <span>Delivery Charges</span>
                            <strong class="font-semibold">
                                {{ session('currency') ?? 'PKR' }} @php
                                    echo Currency::convert()
                                        ->from('PKR')
                                        ->to(Session::get('currency') ?? 'PKR')
                                        ->amount(250)
                                        ->round(2)
                                        ->get();
                                @endphp
                            </strong>
                        </div>
                    </aside>
                    <div class="mt-4">
                        <a href="/checkout"
                            class="border-2 text-center hover:border-blue-500 transition-all flex items-center justify-center rounded-lg py-2">Proceed
                            To Checkout</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layout>
