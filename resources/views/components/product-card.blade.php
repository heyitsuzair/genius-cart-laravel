@props(['product'])

@php
    $pictures = json_decode($product->pictures);
@endphp
<a href="product/{{ $product->id }}">
    <div class="rounded-lg shadow-xl">

        <img src={{ $pictures[0] }} class="w-full h-[10rem] mx-auto rounded-t-lg object-cover" alt="Loading...">
        <div class="p-4">
            <h2 class="text-left font-normal my-3 min-h-[3rem]">{{ Str::substr($product->title, 0, 50) }}...
            </h2>
            <div class="flex justify-between">
                <span class="font-semibold text-sm mt-0.5">
                    {{ session('currency') ?? 'PKR' }} {{ $product->price }}
                </span>
                <span class="text-gray-500 flex items-center gap-2">
                    <input type="hidden" name="rating" id="average-rating" value="{{ $product->average_rating }}">
                    <div class="product-rating">
                    </div>
                    <div class="-mt-0.5">
                        <span>{{ $product->average_rating }}
                            ({{ $product->total_reviews }})</span>
                    </div>
                </span>
            </div>
            <form action="add-to-cart" method="POST" class="my-4 flex gap-2 items-center">
                @csrf
                <button type="submit"
                    class="bg-blue-500 text-white border-blue-500 border-2 hover:border-blue-700 text-center transition-all rounded-md text-sm py-2 hover:bg-blue-700 flex items-center justify-center w-4/5">

                    Add To Cart
                </button>
                <button type="button"
                    class="border-blue-500 w-[17%] border text-blue-500 transition-all hover:text-white text-center rounded-md text-sm py-2 hover:bg-blue-500 flex items-center justify-center">
                    <i class="fa fa-external-link py-1" aria-hidden="true"></i>
                </button>

                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" value="1">
            </form>
        </div>
    </div>
</a>
