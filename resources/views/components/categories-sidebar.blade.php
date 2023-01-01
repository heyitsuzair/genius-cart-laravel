@props(['categories'])
<div class="border rounded py-4">
    <h1 class="font-bold mx-4 border-b">Product Categories</h1>
    @foreach ($categories as $category)
        <div class="my-3">
            <a href="/shop/{{ $category }}">
                <span
                    class="text-gray-600 text-sm transition-all hover:text-blue-500 hover:text-base font-medium mx-4">{{ $category }}</span>
            </a>
        </div>
    @endforeach

</div>
