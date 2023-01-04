@section('title', 'Wishlist')

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
                Wishlist
            </x-heading-3xl>
        </div>
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
                            Stock Status
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
                                    <img src="{{ $first_picture }}" alt="Loading..." class="w-full h-12 object-cover">
                                </th>
                                <td class="px-6 py-4">
                                    <a href="/product/{{ $product->id }}">
                                        {{ $product->title }}
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    {{ session('currency') ?? 'PKR' }} {{ $product->price }}
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="{{ $product->quantity > 0 ? 'text-green-500' : 'text-red-500' }}">{{ $product->quantity > 0 ? 'In Stock' : 'Out Of Stock' }}</span>
                                </td>
                                <td class="px-6 py-4 flex items-center justify-between gap-4">
                                    <form action="product/add-to-cart" method="POST">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="addition_type" value="add">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 transition-all rounded-lg text-white px-4 py-2">
                                            <span>Add To
                                                Cart</span> <i class="fa fa-shopping-cart text-md font-bold"
                                                aria-hidden="true"></i>
                                        </button>
                                    </form>
                                    <form action="/product/{{ $product->id }}/remove-from-wishlist" method="POST">
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
                            <td colspan="12" class="text-center  p-3">No Products Found In Wishlist</td>
                        </tr>
                    @endunless

                </tbody>
            </table>
        </div>


    </div>
</x-layout>
