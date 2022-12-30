@section('title', 'Contact')

@section('nav')
    <x-header-minimal />
@endsection

<x-layout>
    @include('partials.breadcrumb', ['value' => Route::current()->getName()])

</x-layout>
