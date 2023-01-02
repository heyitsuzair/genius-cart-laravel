<form method="get" action="/shop" class="flex justify-center items-center">
    <div x-data="range()" x-init="mintrigger();
    maxtrigger()" class="relative max-w-xl w-full">
        <div>
            <input type="range" step="100" x-bind:min="min" x-bind:max="max"
                x-on:input="mintrigger" x-model="minprice"
                class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

            <input type="range" step="100" x-bind:min="min" x-bind:max="max"
                x-on:input="maxtrigger" x-model="maxprice"
                class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

            <div class="relative z-10 h-2">

                <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200">
                </div>

                <div class="absolute z-20 top-0 bottom-0 rounded-md bg-gray-800"
                    x-bind:style="'right:' + maxthumb + '%; left:' + minthumb + '%'"></div>

                <div class="absolute z-30 w-6 h-6 top-0 left-0 bg-gray-800 rounded-full -mt-2 -ml-1"
                    x-bind:style="'left: ' + minthumb + '%'"></div>

                <div class="absolute z-30 w-6 h-6 top-0 right-0 bg-gray-800 rounded-full -mt-2 -mr-3"
                    x-bind:style="'right: ' + maxthumb + '%'"></div>

            </div>

        </div>

        <div class="flex justify-between items-center py-5">
            <div>
                <input type="text" maxlength="5" name="minimum" x-on:input="mintrigger" x-model="minprice"
                    class="px-3 py-2 border border-gray-200 rounded w-24 text-center">
            </div>
            <div>
                <input type="text" maxlength="5" name="maximum" x-on:input="maxtrigger" x-model="maxprice"
                    class="px-3 py-2 border border-gray-200 rounded w-24 text-center">
            </div>
        </div>

        <div>
            <button type="submit"
                class="text-white w-full bg-blue-500 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Search</button>
        </div>
    </div>
</form>
