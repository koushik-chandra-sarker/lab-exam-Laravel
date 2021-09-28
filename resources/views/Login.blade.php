@extends('Base')

@section('title','Registration')

@section('content')

    <div class="bg-no-repeat bg-cover bg-center relative"
         style="background-image: url(https://images.unsplash.com/photo-1494599948593-3dafe8338d71?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80);">
        <div class="absolute bg-gradient-to-b from-green-500 to-green-400 opacity-75 inset-0 z-0"></div>
        <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
            <div class="flex-col flex  self-center p-10 sm:max-w-5xl xl:max-w-2xl  z-10">
                <div class="self-start hidden lg:flex flex-col  text-white">
                    <img src="" class="mb-3">
                    <h1 class="mb-3 font-bold text-5xl">Hi 👋 Welcome </h1>
                    <p class="pr-3">Lorem ipsum is placeholder text commonly used in the graphic, print,
                        and publishing industries for previewing layouts and visual mockups</p>
                </div>
            </div>
            <div class="flex justify-center self-center  z-10">
                <div class="p-12 bg-white mx-auto rounded-2xl w-100 ">
                    <div class="mb-4">
                        <h3 class="font-semibold text-2xl text-gray-800">Sign In </h3>
                        <p class="text-gray-500">Please sign in to your account.</p>
                    </div>
                    <form action="{{route('user.login')}}" method="post">
                        @csrf
                        <div class="space-y-5">
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700 tracking-wide">Email</label>
                                <input name="email"
                                       class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400"
                                       type="" placeholder="mail@gmail.com">
                            </div>
                            <div class="space-y-2">
                                <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                                    Password
                                </label>
                                <input name="password"
                                       class="w-full content-center text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400"
                                       type="" placeholder="Enter your password">
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input id="remember_me" name="remember_me" type="checkbox"
                                           class="h-4 w-4 bg-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                                    <label for="remember_me" class="ml-2 block text-sm text-gray-800">
                                        Remember me
                                    </label>
                                </div>
                                <div class="text-sm">
                                    <a href="#" class="text-green-400 hover:text-green-500">
                                        Forgot your password?
                                    </a>
                                </div>
                            </div>
                            <div>
                                <button type="submit"
                                        class="w-full flex justify-center bg-green-400  hover:bg-green-500 text-gray-100 p-3  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                                    Sign in
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="pt-5 text-center text-gray-400 text-xs">
                      <span>
                        Don't have an account?
                        <a href="{{route('user.registration.page')}}" rel="" target="_blank" title="Create Account"
                           class="text-green hover:text-green-500 ">Create</a>
                      </span>
                    </div>
                    <div class="pt-5 text-center text-gray-400 text-xs">
                      <span>
                        Copyright © {{date('Y')}}
                        <a href="https://facebook.com/koushik-stack" rel="" target="_blank" title="Facebook Link"
                           class="text-green hover:text-green-500 ">Koushik</a>
                      </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
