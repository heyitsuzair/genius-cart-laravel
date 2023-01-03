<div class="mb-4 border-b border-gray-200">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent"
        role="tablist">
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 rounded-t-lg border-b-2" id="description-tab" data-tabs-target="#description"
                type="button" role="tab" aria-controls="description" aria-selected="false">Description</button>
        </li>
        <li class="mr-2" role="presentation">
            <button
                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300"
                id="reviews-tab" data-tabs-target="#reviews" type="button" role="tab" aria-controls="reviews"
                aria-selected="false">Reviews</button>
        </li>

    </ul>
</div>
<div id="myTabContent">
    <div class="hidden p-4 bg-gray-100 rounded-lg" id="description" role="tabpanel" aria-labelledby="description-tab">
        <p class="text-sm text-gray-500 tracking-wider leading-6">{{ $product->description }}</p>
    </div>
    <div class="hidden" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
        @unless(count($product->reviews) < 1)
            <div class="grid grid-cols-12 justify-center gap-4">
                @foreach ($product->reviews->toArray() as $review)
                    <div class="col-span-12 md:col-span-6 lg:col-span-4 p-4 bg-gray-100 rounded-lg">
                        <div class="flex items-center gap-2 justify-between">
                            <div class="items-center flex gap-4">
                                <img src="{{ asset('src/images/avatar.jpg') }}"
                                    class="w-12 h-12 border border-black rounded-full object-cover" alt="Loading...">
                                <div>
                                    <strong>{{ $review['name'] }}</strong>
                                    <p class="text-gray-600 text-sm">{{ $review['message'] }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <strong class="mt-1">{{ $review['rating'] }}</strong> <i
                                    class="fa fa-star text-yellow-500" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="p-4 bg-gray-100 rounded-lg">
                <p class="text-sm text-gray-500 tracking-wider leading-6">No Reviews Found</p>
            </div>
        @endunless

        <div class="review-form p-4 bg-gray-100 w-1/2 mt-4 rounded-lg">
            <x-add-product-review :product_id="$product->id" />
        </div>
    </div>

</div>
