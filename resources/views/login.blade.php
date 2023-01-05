@section('title', 'Login')


<x-layout>
    <section class="h-screen">
        <div class="container mx-auto px-6 py-12 h-full">
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
                <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-0">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="w-full" alt="Phone image" />
                </div>
                <div class="md:w-8/12 lg:w-5/12 lg:ml-20">
                    <form action="/login" method="POST">
                        @csrf
                        <!-- Email input -->
                        <div class="mb-6">
                            <input type="email"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                name="email" placeholder="Email address" value="admin@geniuscart.com" />
                        </div>

                        <!-- Password input -->
                        <div class="mb-6">
                            <input type="password"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                name="password" placeholder="Password" value="password" />
                        </div>

                        <!-- Submit button -->
                        <button type="submit"
                            class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
                            data-mdb-ripple="true" data-mdb-ripple-color="light">
                            Sign in
                        </button>

                        <div
                            class="flex items-center my-4 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5">
                            <p class="text-center font-semibold mx-4 mb-0">OR</p>
                        </div>
                        <div class="flex items-center flex-col justify-between">
                            <a href="{{ route('facebook.login') }}" class="w-full">
                                <button type="button"
                                    class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 flex w-full justify-center items-center mr-2 mb-2">
                                    <i class="fa fa-brands fa-facebook ml-[1.1rem]" aria-hidden="true"></i> &nbsp;
                                    Sign in with Facebook
                                </button>
                            </a>
                            <a href="{{ route('google.login') }}" class="w-full">
                                <button type="button"
                                    class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex w-full justify-center items-center  mr-2 mb-2">
                                    <i class="fa fa-brands fa-google" aria-hidden="true"></i> &nbsp;
                                    Sign in with Google
                                </button>
                            </a>
                            <a href="{{ route('github.login') }}" class="w-full">
                                <button type="button"
                                    class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex w-full justify-center items-center mr-2 mb-2">
                                    <i class="fa fa-brands fa-github" aria-hidden="true"></i> &nbsp;
                                    Sign in with Github
                                </button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
