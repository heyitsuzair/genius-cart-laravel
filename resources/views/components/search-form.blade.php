<section class="py-7 fixed top-0 bg-gray-100 w-full z-[11] hidden" id="search-form">
    <form action="/search" method="get">
        <div class="container mx-auto rounded-full bg-white flex items-center justify-between">
            <input type="text" name="query" placeholder="Search Product For" class="border-0 focus:ring-0 ml-4 w-5/6"
                id="query">
            <div class="category">
                <select id="countries" name="category" class="border-0 w-40 p-4 focus:ring-0">
                    <option selected>All Categories</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">France</option>
                    <option value="DE">Germany</option>
                </select>
            </div>

            <button type="submit" id="search-btn"
                class="text-white bg-gray-600 hover:bg-gray-800 rounded-r-full p-5"><i
                    class="fa fa-search text-white text-xl  mr-1" aria-hidden="true"></i></button>
        </div>
    </form>
</section>
