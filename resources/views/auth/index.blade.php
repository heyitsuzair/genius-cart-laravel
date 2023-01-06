@section('title', 'Dashboard')

@section('nav')
    <x-header-minimal />
@endsection


@section('footer')
    <x-footer />
@endsection

<x-layout>
    @include('partials.breadcrumb', ['value' => Route::current()->getName()])

    <div class="container mx-auto mb-40 p-4 mt-10">
        <div class="grid grid-cols-12 gap-4 justify-center">
            <div class="col-span-12 lg:col-span-3">
                @include('auth.components.sidebar')
            </div>
            <div class="col-span-12 lg:col-span-9">
                @if (Request::get('route') === 'index')
                    @include('auth.partials.main')
                @endif
                @if (Request::get('route') === 'submissions')
                    @include('auth.partials.submissions.manage', compact('submissions'))
                @endif
                @if (Request::get('route') === 'categories' && !Request::get('action'))
                    @include('auth.partials.categories.manage',
                        compact('categories', 'categories_total_products'))
                @endif
                @if (Request::get('route') === 'categories' && Request::get('action') == 'create')
                    @include('auth.partials.categories.create')
                @endif
                @if (Request::get('route') === 'products' && !Request::get('action'))
                    @include('auth.partials.products.manage', compact('products'))
                @endif
                @if (Request::get('route') === 'products' && Request::get('action') == 'create')
                    @include('auth.partials.products.create')
                @endif
                @if (Request::get('route') === 'products' && Request::get('action') == 'edit')
                    @include('auth.partials.products.edit', compact('product'))
                @endif
                @if (Request::get('route') === 'orders' && !Request::get('action'))
                    @include('auth.partials.orders.manage', compact('orders'))
                @endif
            </div>
        </div>
    </div>
</x-layout>
