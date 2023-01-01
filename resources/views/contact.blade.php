@section('title', 'Contact')

@section('nav')
    <x-header-minimal />
@endsection

@section('footer')
    <x-footer />
@endsection

<x-layout>
    @include('partials.breadcrumb', ['value' => Route::current()->getName()])
    <div class="my-20 container flex flex-col md:flex-row gap-10 mx-auto">
        <article class="px-3 w-full md:w-1/2">
            <x-heading-3xl :divider="true">
                Send Message
            </x-heading-3xl>
            <form action="/contact" method="post">
                @csrf
                <div class="grid grid-cols-12 justify-center my-12 gap-8">
                    <div class="col-span-12 md:col-span-6">
                        <x-input type="text" class="p-4" name="full_name" label="Full Name"
                            value="{{ old('full_name') }}" placeholder="Name *" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-input type="email" class="p-4" name="email" label="Your Email"
                            value="{{ old('email') }}" placeholder="Email Address *" />
                    </div>
                    <div class="col-span-12">
                        <x-input type="tel" class="p-4" name="phone_no" label="Phone Number"
                            value="{{ old('phone_no') }}" placeholder="Phone Number *" />
                    </div>
                    <div class="col-span-12">
                        <x-textarea class="p-4" name="message" label="Message" placeholder="Your Message *"
                            rows="10" columns="10">
                            {{ old('message') }}
                        </x-textarea>
                    </div>
                    <div class="col-span-12">
                        <x-button-md-rounded type="submit" class="bg-gray-700 hover:bg-gray-800 text-white py-3 px-4">
                            Send Message
                        </x-button-md-rounded>
                    </div>
                </div>
            </form>
        </article>
        <aside class="px-3 w-full md:w-1/2">
            <div class="sticky top-0">

                <x-heading-3xl :divider="true">
                    Get In Touch
                </x-heading-3xl>
                <div class="my-12">
                    <div class="contact-item flex flex-col">
                        <strong>Office Address :</strong>
                        <span>Lahore,Pakistan</span>
                    </div>
                    <div class="contact-item flex flex-col my-6">
                        <strong>Contact Number :</strong>
                        <a href="tel:0310 4864150">0310 4864150</a>
                    </div>
                    <div class="contact-item flex flex-col">
                        <strong>Email Address :</strong>
                        <a href="mailto:uzairdevil354123@gmail.com">uzairdevil354123@gmail.com</a>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</x-layout>
