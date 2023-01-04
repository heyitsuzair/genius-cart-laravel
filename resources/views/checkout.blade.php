@php
    include app_path('includes/countries/index.php');
@endphp

@section('title', 'Checkout')

@section('nav')
    <x-header-minimal />
@endsection

@section('footer')
    <x-footer />
@endsection

<x-layout>
    @include('partials.breadcrumb', ['value' => Route::current()->getName()])

    <div class="container mx-auto mb-40 p-4 mt-10">
        <form action="/place-order" class="grid grid-cols-12 gap-4" method="post" id="add-order-form">
            <div class="col-span-12 lg:col-span-9 shadow-xl p-4 rounded-md">
                @csrf
                <div class="grid grid-cols-12 gap-4">
                    <div class="my-3 col-span-12 lg:col-span-6">
                        <x-input-ringged type="text" name="name" label="Full Name" value="{{ old('name') }}"
                            placeholder="Name *" />
                    </div>
                    <div class="my-3 col-span-12 lg:col-span-6">
                        <x-input-ringged type="email" name="email" label="Your Email" value="{{ old('email') }}"
                            placeholder="Email Address *" />
                    </div>
                    <div class="my-3 col-span-12 lg:col-span-6">
                        <x-input-ringged type="text" name="address" label="Your Address" value="{{ old('address') }}"
                            placeholder="Residential Address *" />
                    </div>
                    <div class="my-3 col-span-12 lg:col-span-6">
                        <x-input-ringged type="tel" name="contact" label="Your Phone No"
                            value="{{ old('contact') }}" placeholder="e.x 03104864150 *" />
                    </div>
                    <div class="col-span-12">
                        <label for="countries"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                            an
                            option</label>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected>Choose a country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country['name'] }}">{{ $country['name'] }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-3 mt-7 lg:mt-0">
                <div class="lg:sticky lg:top-24">
                    <aside class="shadow-md">
                        <div class="bg-gray-100 py-2 border-b border-black px-3">
                            <strong class="font-semibold">Checkout</strong>
                        </div>
                        <div class="py-4 border-b border-gray-300 gap-4 flex justify-between items-center px-3">
                            <span>Sub Total</span>
                            <strong class="font-semibold">
                                @php
                                    $total = 0;
                                    
                                    foreach ($products as $product) {
                                        $total += $product->price * intval($product->requested_quantity);
                                    }
                                @endphp
                                {{ session('currency') ?? 'PKR' }} {{ $total }}
                            </strong>
                        </div>
                        <div class="py-4 border-b border-gray-300 gap-4 flex justify-between items-center px-3">
                            <span>Delivery Charges</span>
                            <strong class="font-semibold">
                                {{ session('currency') ?? 'PKR' }} @php
                                    echo Currency::convert()
                                        ->from('PKR')
                                        ->to(Session::get('currency') ?? 'PKR')
                                        ->amount(250)
                                        ->round(2)
                                        ->get();
                                @endphp
                            </strong>
                        </div>
                        <div class="py-4 border-b border-gray-300 gap-4 flex justify-between items-center px-3">
                            <span>Total</span>
                            <strong class="font-semibold">
                                {{ session('currency') ?? 'PKR' }} @php
                                    echo Currency::convert()
                                        ->from('PKR')
                                        ->to(Session::get('currency') ?? 'PKR')
                                        ->amount(250)
                                        ->round(2)
                                        ->get() + $total;
                                @endphp
                            </strong>
                        </div>
                    </aside>
                    <div class="mt-4">
                        <a href="/checkout"
                            class="border-2 text-center hover:border-blue-500 transition-all flex items-center justify-center rounded-lg py-2">Place
                            Order</a>
                    </div>
                </div>
            </div>
        </form>

    </div>
</x-layout>
