<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Phone No
                </th>
                <th scope="col" class="px-6 py-3">
                    Message
                </th>
            </tr>
        </thead>
        <tbody>
            @unless(count($submissions) < 1)
                @foreach ($submissions as $submission)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            {{ $submission->full_name }}
                        </th>
                        <td class="px-6 py-4">
                            <a href="mailto:{{ $submission->email }}" class="underline">
                                {{ $submission->email }}
                            </a>
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                            <a href="tel:{{ $submission->phone_no }}" class="underline">
                                {{ $submission->phone_no }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            {{ $submission->message }}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="py-3 text-center" colspan="12">No Submissions Found</td>
                </tr>
            @endunless


        </tbody>
    </table>
</div>
