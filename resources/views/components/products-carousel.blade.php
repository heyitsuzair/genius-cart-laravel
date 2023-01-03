@unless(count($related_products) < 1)
    <div class="my-12">
        <x-heading-3xl :divider="true">
            Related Products
        </x-heading-3xl>
    </div>
    <div class="owl-carousel related-products">
        @foreach ($related_products as $product)
            <div class="mb-1">
                <x-product-card :product="$product" />
            </div>
        @endforeach
    </div>
@endunless
