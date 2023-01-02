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
    <div class="hidden p-4 bg-gray-100 rounded-lg" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
        <p class="text-sm text-gray-500">This is some placeholder content the <strong
                class="font-medium text-gray-800">Dashboard tab's associated content</strong>. Clicking
            another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control
            the content visibility and styling.</p>
    </div>

</div>
