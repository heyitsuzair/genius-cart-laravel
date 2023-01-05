@include('auth.components.delete-modal', [
    'action' => 'submit',
    'title' => 'Delete Category',
    'message' =>
        'Are you sure you want to delete this category? Deleting this category will also delete its corresponding products.',
])
@include('auth.components.edit-modal', [
    'action' => 'submit',
    'title' => 'Edit Category',
])


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Total Products
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @unless(count($categories) < 1)
                @php
                    $i = 0;
                @endphp
                @foreach ($categories as $category)
                    @php
                        $i++;
                    @endphp
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            {{ $i }}
                        </th>
                        <td class="px-6 py-4">
                            <a href="/shop?category={{ $category->id }}" class="underline">
                                {{ $category->category }}
                            </a>
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                            {{ $categories_total_products[$category->id] }}

                        </td>
                        <td class="px-6 py-4 flex items-start gap-4">

                            <button type="button" data-id="{{ $category->id }}" data-action="/categories"
                                data-name="category_id"
                                class="border-red-500 bg-red-500 open-delete-modal rounded-full text-white flex items-center justify-center w-8 h-8 transitiion-all hover:bg-red-700 border-red-700">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>


                            <button type="button" data-id="{{ $category->id }}" data-action="/categories"
                                data-name="category" data-value="{{ $category->category }}"
                                class="border-blue-500 bg-blue-500 open-edit-modal rounded-full text-white flex items-center justify-center w-8 h-8 transitiion-all hover:bg-blue-700 border-blue-700">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>

                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="py-3 text-center" colspan="12">No Categories Found</td>
                </tr>
            @endunless

        </tbody>
    </table>
</div>
<div class="mt-10">
    {{ $categories->links() }}
</div>
