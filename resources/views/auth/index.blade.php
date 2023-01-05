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
            <div class="col-span-3">
                @include('auth.components.sidebar')
            </div>
            <div class="col-span-9">
                @if (Request::get('route') === 'submissions')
                    @include('auth.partials.submissions', compact('submissions'))
                @endif
            </div>
        </div>
    </div>
</x-layout>