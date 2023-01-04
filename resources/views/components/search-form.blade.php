<section class="py-7 fixed top-0 bg-gray-100 w-full z-[21] hidden" id="search-form">
    <form action="/shop" method="get">
        <div class="container mx-auto rounded-full bg-white flex items-center justify-between">
            <input type="text" name="query" placeholder="Search Product For" class="border-0 focus:ring-0 ml-4 w-3/4"
                id="query">
            <div class="flex w-[24%] items-center">
                @php
                    use App\Models\Category;
                    $categories = Category::all();
                @endphp
                <select id="countries" name="category_id" class="border-0 w-full p-4 focus:ring-0">
                    <option selected value="all">All Categories</option>
                    @foreach ($categories as $category)
                        <option value={{ $category->id }}>{{ $category->category }}</option>
                    @endforeach
                </select>
                <button type="submit" id="search-btn"
                    class="text-white bg-gray-600 hover:bg-gray-800 rounded-r-full p-5"><i
                        class="fa fa-search text-white text-xl  mr-1" aria-hidden="true"></i></button>
            </div>
        </div>
    </form>
</section>
