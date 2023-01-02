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
            <div>
                @include('components.product.header-info', compact('product', 'is_in_wishlist'))
            </div>
            <div class="my-5">
                @include('components.product.tabs', compact('product'))
            </div>
        </div>
    </div>
    </div>
</x-layout>
