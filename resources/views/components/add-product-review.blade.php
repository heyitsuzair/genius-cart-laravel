@props(['product_id'])
<form action="/product/{{ $product_id }}/add-review" method="post" id="add-review-form">
    @csrf
    <div class="my-3 flex items-center gap-2">
        <strong>Rating:</strong>
        <div class="rating mt-[0.4rem]">
            <div class="my-rating">
            </div>

        </div>
    </div>
    <div>
        <input type="hidden" id="rating" name="rating" value="0">
    </div>
    <div class="my-3">
        <x-input-ringged type="text" name="name" label="Full Name" value="{{ old('name') }}"
            placeholder="Name *" />
    </div>
    <div class="my-3">
        <x-input-ringged type="email" name="email" label="Your Email" value="{{ old('email') }}"
            placeholder="Email Address *" />
    </div>
    <div class="my-3">
        <x-text-area-ringged name="message" label="Your Message" value="{{ old('message') }}"
            placeholder="Write Your Thoughts.... *" />
    </div>
    <div class="my-3">
        <x-btn-loading>
            Sending...
        </x-btn-loading>
    </div>
</form>
