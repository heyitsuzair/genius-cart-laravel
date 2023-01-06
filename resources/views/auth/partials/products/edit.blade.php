<div class="rounded-lg shadow-lg p-4">
    <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-input-ringged type="text" name="title" label="Product Title" value="{{ $product->title }}"
            placeholder="Please Enter Title *" />
        <div class="my-3">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Product Description</label>
            <textarea id="description" name="description"
                class="block w-full text-gray-900 border-gray-300 rounded-md bg-gray-100 sm:text-xs focus:ring-blue-500 focus:border-blue-500 p-2"
                rows="10">
                {{ $product->description }}
            </textarea>
            @error('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-3">
            <x-input-ringged type="number" name="price" label="Product Price (PKR)" value="{{ $product->price }}"
                placeholder="Please Enter Price *" />
        </div>
        <div class="my-3">
            <x-input-ringged type="number" name="quantity" label="Product Quantity" value="{{ $product->quantity }}"
                placeholder="Please Enter Available Quantity *" />
        </div>
        <div class="my-3">
            @php
                use App\Models\Category;
                $categories = Category::all();
            @endphp
            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900">Select Category *</label>
            <select id="categories" name="category_id"
                class="block w-full text-gray-900 border-gray-300 rounded-md bg-gray-100 text-sm focus:ring-blue-500 focus:border-blue-500 p-2.5">
                @foreach ($categories as $category)
                    <option value={{ $category->id }} {{ $category->id == $product->category_id ? 'selected' : '' }}>
                        {{ $category->category }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

        </div>
        <div class="my-3">
            <label for="pictures" class="block mb-2 text-sm font-medium text-gray-900">Upload Image *</label>
            <input
                class="block w-full image-upload text-gray-900 border-gray-300 rounded-md bg-gray-100 text-sm focus:ring-blue-500 focus:border-blue-500"
                accept="image/png, image/gif, image/jpeg,image/jpg" id="pictures" name="pictures[]" type="file"
                multiple>
            <div class="image-preview grid grid-cols-12 gap-4 mt-4">
                @foreach (json_decode($product->pictures) as $picture)
                    <div class="col-span-3">
                        <img src="{{ $picture }}" class="object-cover w-full h-28 rounded-md" alt="Loading...">
                    </div>
                @endforeach
            </div>
            @error('pictures')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-3">
            <x-btn-loading>
                Submitting...
            </x-btn-loading>
        </div>
    </form>
</div>
