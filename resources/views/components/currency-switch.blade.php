<button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation"
    class="text-black font-medium text-sm inline-flex items-center" type="button">{{ session('currency') ?? 'PKR' }} <svg
        class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
    </svg></button>

<!-- Dropdown menu -->
<div id="dropdownInformation" class="hidden z-[21] w-44 bg-white rounded divide-y divide-gray-100 shadow">

    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
        <li>
            <form action="/switch-currency" method="GET">
                <input type="hidden" name="currency" value="USD">
                <button class="w-full text-left py-2 px-4 hover:bg-gray-100" type="submit">USD</button>
            </form>
        </li>
        <li>
            <form action="/switch-currency" method="GET">
                <input type="hidden" name="currency" value="PKR">
                <button class="w-full text-left py-2 px-4 hover:bg-gray-100" type="submit">PKR</button>
            </form>
        </li>
    </ul>
</div>
