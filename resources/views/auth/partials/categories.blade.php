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
                        <td class="px-6 py-4">
                            <i class="fa fa-xmark"></i>
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
