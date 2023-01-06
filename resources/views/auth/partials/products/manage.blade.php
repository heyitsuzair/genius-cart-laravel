@include('auth.components.delete-modal', [
    'action' => 'submit',
    'title' => 'Delete Product',
    'message' =>
        'Are you sure you want to delete this product? Deleting this product will also delete its correspondings (reviews, this item in orders)',
])

<x-floating-button href="?route=products&action=create">
    fa fa-plus text-lg
</x-floating-button>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price (PKR)
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50">
                    Rating
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @unless(count($products) < 1)
                @php
                    $i = 0;
                @endphp
                @foreach ($products as $product)
                    @php
                        $i++;
                    @endphp
                    <tr class="border-b border-gray-200">
                        <td class="px-6 py-4 font-bold">
                            {{ $i }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 bg-gray-50">
                            <a href="/product/{{ $product->id }}" class="underline">
                                {{ Str::substr($product->title, 0, 15) }} ...
                            </a>
                        </th>
                        <td class="px-6 py-4">
                            {{ Str::substr($product->description, 0, 50) }} ...
                        </td>
                        <td class="px-6 py-4 bg-gray-50">
                            <a href="/shop?category={{ $product->category->id }}" class="underline">
                                {{ $product->category->category }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            Rs {{ $product->price }}
                        </td>
                        <td class="px-6 py-4 bg-gray-50">
                            <div class="flex items-center gap-[0.2rem]">
                                <i class="fa fa-star text-yellow-500" aria-hidden="true"></i> {{ $product->average_rating }}
                            </div>
                        </td>

                        <td class="px-6 py-4 flex items-start gap-4">

                            <button type="button" data-id="{{ $product->id }}" data-action="/products"
                                data-name="product_id"
                                class="border-red-500 bg-red-500 open-delete-modal rounded-full text-white flex items-center justify-center w-8 h-8 transitiion-all hover:bg-red-700 border-red-700">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>

                            <a href="?route=products&action=edit&id={{ $product->id }}">
                                <button type="button"
                                    class="border-blue-500 bg-blue-500 open-edit-modal rounded-full text-white flex items-center justify-center w-8 h-8 transitiion-all hover:bg-blue-700 border-blue-700">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                            </a>
                        </td>


                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="py-3 text-center" colspan="12">No Products Found</td>
                </tr>
            @endunless


        </tbody>
    </table>
</div>
<div class="mt-10">
    {{ $products->links() }}
</div>
