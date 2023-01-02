@section('title', 'Product')

@section('nav')
    <x-header-minimal />
@endsection

@section('footer')
    <x-footer />
@endsection

<x-layout>
    @include('partials.breadcrumb', ['value' => Route::current()->getName()])
    <div class="my-10">
        <div class="container mx-auto">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-6">
                    <div class="flex flex-col">
                        @php
                            $decoded_pictures = json_decode($product->pictures);
                            $first_picture = $decoded_pictures[0];
                        @endphp
                        <a href="{{ $first_picture }}" class="img-magnifier-container">
                            <img src="{{ $first_picture }}" class="w-full lg:w-[40rem] h-[25rem] mx-auto object-cover"
                                id="active-image" alt="Loading...">
                        </a>
                        <div class="product-images grid grid-cols-12 items-center gap-4 mt-5">
                            @foreach ($decoded_pictures as $picture)
                                <div class="col-span-3">
                                    <img src="{{ $picture }}"
                                        class="w-full lg:w-[10rem] h-[5rem] mx-auto cursor-pointer product-images object-cover"
                                        alt="Loading...">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-6">
                    <div class="flex flex-col gap-4">
                        <a href="/shop?category={{ $product->category_id }}"
                            class="hover:text-blue-500 font-semibold transition-all text-gray-400 text-sm">
                            {{ $product->category->category }}</a>
                        <h1 class="font-bold text-4xl">{{ $product->title }}</h1>
                        <span class="text-gray-500"> {{ $product->average_rating }}
                            ({{ $product->total_reviews }})</span>
                        <strong>{{ session('currency') ?? 'PKR' }} {{ $product->price }}</strong>
                        <span
                            class="{{ $product->quantity > 0 ? 'text-green-500' : 'text-red-500' }}">{{ $product->quantity > 0 ? 'In Stock' : 'Out Of Stock' }}</span>
                        <div class="flex gap-2 items-center">
                            <i class="fa fa-tag" aria-hidden="true"></i>
                            <span><strong>Product SKU:</strong> Tcv6794KXS1</span>
                        </div>
                        @if ($is_in_wishlist)
                            <div>
                                <i class="fa-regular fa-heart" aria-hidden="true"></i>
                                <span>Already In Wishlist</span>
                            </div>
                        @else
                            <form action="/add-to-wishlist" method="post" class="wishlist">
                                @csrf
                                <button type="submit">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <i class="fa-regular fa-heart" aria-hidden="true"></i>
                                    <span>Add To Wishlist</span>
                                </button>
                            </form>
                        @endif
                        <form action="/add-to-cart" method="post">
                            @csrf
                            <div class="quantity mt-3">
                                <input type="hidden" name="producy_id" value="{{ $product->id }}">
                                <input type="hidden" name="prod_available_quantity" value="{{ $product->quantity }}"
                                    id="available_quantity">
                                <button type="button"
                                    class="btn-green w-[7%] h-[2.6rem] minus-product border border-gray-300">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                                <input type="number"
                                    class="border-0 outline-0 focus:ring-0 text-center w-[7%] border border-gray-300 pr-0"
                                    value="1" name="quantity" id="single_prod_quantity" readonly>
                                <input type="hidden" value="add" name="addition_type" id="addition_type">
                                <button type="button"
                                    class="btn-green w-[7%] h-[2.6rem] plus-product border border-gray-300">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                                <button type="submit" name="add-to-cart"
                                    {{ $product->quantity < 1 ? 'disabled' : '' }}
                                    class=" {{ $product->quantity < 1 ? 'disabled' : '' }} bg-blue-500 hover:bg-blue-700 text-white rounded-lg disabled:opacity-50 disabled:hover:bg-blue-500 py-2 w-1/3 ml-3 transition-all"
                                    id="add_to_cart">
                                    <span class="btn-single-product">Add To Cart</span>
                                </button>
                                <button type="button" name="buy-now" {{ $product->quantity < 1 ? 'disabled' : '' }}
                                    class=" {{ $product->quantity < 1 ? 'disabled' : '' }} hover:bg-blue-500 bg-white text-blue-500 hover:text-white rounded-lg disabled:opacity-50 disabled:hover:bg-white disabled:hover:text-blue-500 py-2 w-1/5 ml-3 border border-blue-500 transition-all"
                                    id="buy_now">
                                    <span class="btn-single-product">Buy Now</span>
                                </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</x-layout>
