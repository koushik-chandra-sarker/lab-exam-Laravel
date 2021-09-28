@extends('Base')
@section('title','Home')

@section('content')
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <span class="ml-3 text-xl">Covid-19 vaccination Survey</span>
            </a>
            <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                <a href="#">
                    <button
                        class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">
                        Add Question
                    </button>
                </a>
                <a href="#">
                    <button
                        class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">
                        Add Answer
                    </button>
                </a>
            </nav>
            <a href="{{route('user.logout')}}">
                <button
                    class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">
                    Logout
                </button>
            </a>
        </div>
    </header>

    {{--    add question--}}
    <section class="text-blueGray-700 ">
        <div class="container items-center px-5 py-12 lg:px-20 mx-auto">
            <div
                class="flex flex-col w-full p-10 mx-auto my-6 transition duration-500 ease-in-out transform bg-white border rounded-lg lg:w-2/6 md:w-1/2 md:mt-0">
                <div class="relative mt-4">
                    <label for="question" class="text-base leading-7 text-blueGray-500">Question</label>
                    <input type="text" id="question" name="question" placeholder="What is your Question?"
                           class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                </div>
                <div class="relative mt-4">
                    <label for="location" class="text-base leading-7 text-blueGray-500">Location</label>
                    <input type="text" id="location" name="location" placeholder="Ex. Dhaka"
                           class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                </div>
                <button
                    class="w-full px-16 py-2 my-2 mr-2 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">
                    Submit
                </button>
            </div>
        </div>
    </section>

    {{--    add Answer--}}
    <section class="text-blueGray-700 ">
        <div class="container items-center px-5 py-12 lg:px-20 mx-auto">
            <div
                class="flex flex-col w-full p-10 mx-auto my-6 transition duration-500 ease-in-out transform bg-white border rounded-lg lg:w-2/6 md:w-1/2 md:mt-0">
                <div class="relative mt-4">
                    <label for="question" class="text-base leading-7 text-blueGray-500">Question</label>
                    <input type="text" id="question" name="question" placeholder="What is your Question?"
                           class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                </div>
                <div class="relative mt-4">
                    <label for="location" class="text-base leading-7 text-blueGray-500">Location</label>
                    <input type="text" id="location" name="location" placeholder="Ex. Dhaka"
                           class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                </div>
                <button
                    class="w-full px-16 py-2 my-2 mr-2 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">
                    Submit
                </button>
            </div>
        </div>
    </section>

@endsection
