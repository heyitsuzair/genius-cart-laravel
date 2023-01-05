@section('title', 'Login')


<x-layout>
    <section class="h-screen">
        <div class="container px-6 py-12 h-full">
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
                        <div class="flex items-center justify-between">
                            <a href="{{ route('facebook.login') }}" class="w-full">
                                <button type="button"
                                    class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center mr-2 mb-2">
                                    <svg class="w-4 h-4 mr-2 -ml-1" aria-hidden="true" focusable="false"
                                        data-prefix="fab" data-icon="facebook-f" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                        <path fill="currentColor"
                                            d="M279.1 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.4 0 225.4 0c-73.22 0-121.1 44.38-121.1 124.7v70.62H22.89V288h81.39v224h100.2V288z">
                                        </path>
                                    </svg>
                                    Sign in with Facebook
                                </button>
                            </a>
                            <button type="button"
                                class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                                <svg class="w-4 h-4 mr-2 -ml-1" aria-hidden="true" focusable="false" data-prefix="fab"
                                    data-icon="google" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 488 512">
                                    <path fill="currentColor"
                                        d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
                                    </path>
                                </svg>
                                Sign in with Google
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
