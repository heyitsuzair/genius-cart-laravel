<div class="mb-4 border-b border-gray-200">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent"
        role="tablist">
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 rounded-t-lg border-b-2" id="description-tab" data-tabs-target="#description"
                type="button" role="tab" aria-controls="description" aria-selected="false">Description</button>
        </li>
        <li class="mr-2" role="presentation">
            <button
                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300"
                id="reviews-tab" data-tabs-target="#reviews" type="button" role="tab" aria-controls="reviews"
                aria-selected="false">Reviews</button>
        </li>

    </ul>
</div>
<div id="myTabContent">
    <div class="hidden p-4 bg-gray-100 rounded-lg" id="description" role="tabpanel" aria-labelledby="description-tab">
        <p class="text-sm text-gray-500 tracking-wider leading-6">{{ $product->description }}</p>
    </div>
    <div class="hidden" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
        <div class="grid grid-cols-12 justify-center gap-4">
            <div class="col-span-12 md:col-span-6 lg:col-span-4 p-4 bg-gray-100 rounded-lg">
                <div class="flex items-center gap-2 justify-between">
                    <div class="items-center flex gap-4">
                        <img src="{{ asset('src/images/avatar.jpg') }}"
                            class="w-12 h-12 border border-black rounded-full object-cover" alt="Loading...">
                        <div>
                            <strong>Muhammad Uzair</strong>
                            <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti,
                                dolorem?</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <strong class="mt-1">5</strong> <i class="fa fa-star text-yellow-500" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-4 p-4 bg-gray-100 rounded-lg">
                <div class="flex items-center gap-2 justify-between">
                    <div class="items-center flex gap-4">
                        <img src="{{ asset('src/images/avatar.jpg') }}"
                            class="w-12 h-12 border border-black rounded-full object-cover" alt="Loading...">
                        <div>
                            <strong>Muhammad Uzair</strong>
                            <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti,
                                dolorem?</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <strong class="mt-1">5</strong> <i class="fa fa-star text-yellow-500" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-4 p-4 bg-gray-100 rounded-lg">
                <div class="flex items-center gap-2 justify-between">
                    <div class="items-center flex gap-4">
                        <img src="{{ asset('src/images/avatar.jpg') }}"
                            class="w-12 h-12 border border-black rounded-full object-cover" alt="Loading...">
                        <div>
                            <strong>Muhammad Uzair</strong>
                            <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti,
                                dolorem?</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <strong class="mt-1">5</strong> <i class="fa fa-star text-yellow-500" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-4 p-4 bg-gray-100 rounded-lg">
                <div class="flex items-center gap-2 justify-between">
                    <div class="items-center flex gap-4">
                        <img src="{{ asset('src/images/avatar.jpg') }}"
                            class="w-12 h-12 border border-black rounded-full object-cover" alt="Loading...">
                        <div>
                            <strong>Muhammad Uzair</strong>
                            <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti,
                                dolorem?</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <strong class="mt-1">5</strong> <i class="fa fa-star text-yellow-500" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="review-form p-4 bg-gray-100 w-1/2 mt-4 rounded-lg">
            <form action="/product/{{ $product->id }}/add-review" method="post" id="add-review-form">
                @csrf
                <div>
                    <label for="name" class="block mb-2 text-sm my-3 font-medium text-gray-900">Name</label>
                    <input type="text" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="John Doe *" name="name">
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm my-3 font-medium text-gray-900">Email</label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="example@company.com *">
                </div>
                <div>
                    <label for="message" class="block mb-2 text-sm my-3 font-medium text-gray-900 dark:text-white">Your
                        message</label>
                    <textarea id="message" name="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Write your thoughts here... *"></textarea>

                </div>
                <div class="my-3">
                    <x-btn-loading>
                        Sending...
                    </x-btn-loading>
                </div>
            </form>
        </div>
    </div>

</div>
