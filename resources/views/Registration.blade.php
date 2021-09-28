@extends('Base')

@section('title','Registration')

@section('content')
    <!-- component -->
    <!-- Container -->
    <div class="bg-gradient-to-r from-yellow-400 via-red-500 to-pink-500 h-screen">
        <div class="container mx-auto">
            <div class="flex justify-center px-6">
                <!-- Row -->
                <div class="w-full xl:w-3/4 lg:w-11/12 flex mt-12">
                    <!-- Col -->
                    <div
                        class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
                        style="background-image: url('https://images.unsplash.com/photo-1545239351-1141bd82e8a6?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTd8fHJlZ2lzdHJhdGlvbnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60')"
                    ></div>
                    <!-- Col -->
                    <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                        <h3 class="pt-4 text-2xl text-center">Create an Account!</h3>
                        <form action="{{route('user.registration')}}" method="post" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                            @csrf

                            @if(\Illuminate\Support\Facades\Session::has('data'))
                                <div class="w-full text-white bg-red-500">
                                    <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                                        <div class="flex">
                                            <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                                <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"></path>
                                            </svg>

                                            <p class="mx-3">{{\Illuminate\Support\Facades\Session::get('data')}}</p>
                                        </div>

{{--                                        <button type="button" class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">--}}
{{--                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                            </svg>--}}
{{--                                        </button>--}}
                                    </div>
                                </div>
                            @endif


                            <div class="mb-4 md:flex md:justify-between">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                                        First Name
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="firstName"
                                        type="text"
                                        placeholder="First Name"
                                        name="first_name"
                                    />
                                </div>
                                <div class="md:ml-2">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="last_name">
                                        Last Name
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="last_name"
                                        type="text"
                                        name="last_name"
                                        placeholder="Last Name"
                                    />
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                    Email
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="email"
                                    type="email"
                                    placeholder="Email"
                                    name="email"
                                />
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="gender">
                                    Gender
                                </label>
                                {{--                                <select name="gender" id="gender" class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">--}}
                                {{--                                    <option value="male">Male</option>--}}
                                {{--                                    <option female="saab">Female</option>--}}
                                {{--                                    <option other="opel">Other</option>--}}
                                {{--                                </select>--}}
                                <div class="mb-4 md:flex md:justify-between">
                                    <div>
                                        <input type="radio" id="male" name="gender" value="male">
                                        <label for="male">Male</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="female" name="gender" value="female">
                                        <label for="female">Female</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="other" name="gender" value="other">
                                        <label for="other">Other</label>
                                    </div>
                                </div>

                            </div>

                            <div class="mb-4 md:flex md:justify-between">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                        Password
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="password"
                                        type="password"
                                        placeholder="******************"
                                        name="password"
                                    />
                                </div>
                                <div class="md:ml-2">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="c_password">
                                        Confirm Password
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="c_password"
                                        type="password"
                                        placeholder="******************"
                                        name="confirm_password"
                                    />
                                </div>
                            </div>
                            <div class="mb-6 text-center">
                                <button
                                    class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                    type="submit"
                                >
                                    Register Account
                                </button>
                            </div>
                            <hr class="mb-6 border-t"/>
                            <div class="text-center">
                                <a
                                    class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                    href="{{route('user.login')}}"
                                >
                                    Already have an account? Login!
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
