<div class="rounded-lg shadow-lg p-4">
    <form action="/categories" method="POST">
        @csrf
        <x-input-ringged type="text" name="category" label="Category Title" value="{{ old('category') }}"
            placeholder="Please Enter Title *" />
        <div class="my-3">
            <x-btn-loading>
                Submitting...
            </x-btn-loading>
        </div>
    </form>
</div>
