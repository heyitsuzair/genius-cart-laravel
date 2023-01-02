@section('title', 'Shop')

@section('nav')
    <x-header-minimal />
@endsection

@section('footer')
    <x-footer />
@endsection

<x-layout>
    @include('partials.breadcrumb', ['value' => Route::current()->getName()])

    <div class="grid grid-cols-12 gap-7 mx-auto px-12 my-12 justify-center">
        <aside class="col-span-12 lg:col-span-3">
            <div class="lg:sticky lg:top-24">
                <x-categories-sidebar :categories="$categories" />

                <div class="filter my-5">
                    <h1 class="font-bold mx-4 border-b">Filter By Price</h1>
                    <div class="my-8">
                        <x-filter-by-price />
                    </div>
                </div>
        </aside>
        <section class="col-span-12 lg:col-span-9">
            <div class="rounded-lg p-4 bg-gray-100">
                <span class="font-semibold">Shop</span>
            </div>
            <div class="my-5">
                <div class="grid grid-cols-12 gap-6">
                    @unless(count($products) < 1)
                        @foreach ($products as $product)
                            <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                                <x-product-card :product="$product" />
                            </div>
                        @endforeach
                    @else
                        <div class="col-span-12">
                            Sorry We Cannot Find What You Are Looking For!
                        </div>
                    @endunless
                </div>
            </div>
            <div class="my-5">
                {{ $products->links() }}
            </div>
        </section>
    </div>
</x-layout>
<script>
    function range() {
        return {
            minprice: 1000,
            maxprice: 100000,
            min: 1000,
            max: 100000,
            minthumb: 0,
            maxthumb: 0,

            mintrigger() {
                this.minprice = Math.min(this.minprice, this.maxprice - 500);
                this.minthumb =
                    ((this.minprice - this.min) / (this.max - this.min)) * 100;
            },

            maxtrigger() {
                this.maxprice = Math.max(this.maxprice, this.minprice + 500);
                this.maxthumb =
                    100 -
                    ((this.maxprice - this.min) / (this.max - this.min)) * 100;
            },
        };
    }
</script>
