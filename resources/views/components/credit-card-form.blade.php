<div class="grid grid-cols-12 gap-4">
    <div class="col-span-6 md:col-span-6">
        <x-input-ringged type="number" name="card_no" label="Card Number" value="{{ old('card_no') }}"
            placeholder="4242424242424242 *" />
    </div>
    <div class="col-span-6 md:col-span-2">
        <x-input-ringged type="number" name="card_cvc" label="CVC" value="{{ old('card_cvc') }}"
            placeholder="123 *" />
    </div>
    <div class="col-span-6 md:col-span-2">
        <x-input-ringged type="number" name="expiry_month" label="Expiry Month" value="{{ old('expiry_month') }}"
            placeholder="12 *" />
    </div>
    <div class="col-span-6 md:col-span-2">
        <x-input-ringged type="number" name="expiry_year" label="Expiry Year" value="{{ old('expiry_year') }}"
            placeholder="2025 *" />
    </div>
</div>
