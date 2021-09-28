@extends('Base')
@section('title','Home')

@section('content')


    <section class="flex-col w-full md:flex md:flex-row md:min-h-screen bg-blue-50">
        {{--    sidenav--}}
        <nav class="flex flex-col flex-shrink-0 w-full bg-white shadow-xl text-blue-700 md:w-64">
            <div class="flex flex-row items-center justify-between flex-shrink-0 py-4">
                <a href="/" class="px-2 focus:outline-none">
                    <h2 class=" flex items-center justify-centerblock p-2 text-xl text-center font-medium tracking-tighter text-black transition duration-500 ease-in-out transform cursor-pointer hover:text-blue-500 lg:text-x lg:mr-8">
                        <i class="fas fa-virus text-4xl text-blue-400 mr-2"></i>
                        Survey
                    </h2>
                </a>
            </div>
            <nav class="flex-grow pb-4 pr-4 md:block md:pb-0 md:overflow-y-auto">
                <ul>
                    <li>
                        <a class=" bar_btn block px-4 py-2 mt-2 text-base transition duration-500 ease-in-out transform border-l-4 border-blue-600 text-blue-500 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-black"
                           href="#">Home</a>
                    </li>
                    <li>
                        <a class=" bar_btn block px-4 py-2 mt-2 text-base transition duration-500 ease-in-out transform border-l-4 border-white text-blue-500 hover:border-blue-600 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-black"
                           href="#">Questions Type</a>
                    </li>
                    <li>
                        <a class=" bar_btn block px-4 py-2 mt-2 text-base transition duration-500 ease-in-out transform border-l-4 border-white text-blue-500 hover:border-blue-600 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-black"
                           href="#">Questions</a>
                    </li>
                    <li>
                        <a class=" bar_btn block px-4 py-2 mt-2 text-base transition duration-500 ease-in-out transform border-l-4 border-white text-blue-500 hover:border-blue-600 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-black"
                           href="#">Answer</a>
                    </li>
                    <li>
                        <a class=" bar_btn block px-4 py-2 mt-2 text-base transition duration-500 ease-in-out transform border-l-4 border-white text-blue-500 hover:border-blue-600 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-black"
                           href="#">Location</a>
                    </li>
                </ul>
            </nav>
        </nav>
        {{--    sidenav end--}}
        {{--        main content--}}

        <main>
            {{--            add questions--}}
            <section class=" w-full flex flex-wrap">
                <div class=" p-12 md:w-1/2 flex flex-col items-start">
                    <form
                        id="q_form"
                        name="q_form"
                        class=" w-full p-10 px-8 pt-6  transition duration-500 ease-in-out transform bg-white border rounded-lg "
                    >
                        @csrf

                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 ">
                                <label class="text-base leading-7 text-blue-500" for="q_question"> Question </label>
                                <input
                                    class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blue-100 focus:border-blue-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2"
                                    id="q_question" type="text" name="question" placeholder="Ex. What is Your Name?"
                                    required>
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/2">
                                <label class="text-base leading-7 text-blue-500" for="question_type"> Question
                                    type </label>
                                <div class="relative" id="question_type">
                                    <select
                                        id="q_question_type"
                                        name="question_type"
                                        class="w-full px-4 py-2 mt-2 text-base text-blue-500 transition duration-500 ease-in-out transform border border-transparent rounded-lg appearance-none bg-blue-100 focus:border-blue-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                                        <option disabled selected value> -- select a question type --</option>
                                        @foreach ($question_types as $que_type)

                                            <option
                                                class="block mb-4 text-xs font-bold tracking-wide text-blue-500 uppercase "
                                                value="{{$que_type->id}}"> {{$que_type->name}}
                                            </option>
                                        @endforeach

                                    </select>
                                    <!---pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-blue-700-->
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-blue-500">
                                        <svg fill="#ffffff" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                        </svg>
                                    </div>
                                </div>

                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/2 text-center flex items-center justify-center">
                                <div>
                                    <label for="q_active" class="cursor-pointer label">Active</label>
                                    <input class="ml-3" id="q_active" name="question_active" type="checkbox"
                                           checked="checked">
                                </div>

                            </div>

                        </div>
                        <div class="flex flex-wrap mb-2 -mx-3">
                            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                <label class="text-base leading-7 text-blue-500" for="q_country_id"> Country </label>
                                <div class="relative">
                                    <select id="q_country_id" name="country"
                                            onchange="getCity(this)"
                                            class="w-full px-4 py-2 mt-2 text-base text-blue-500 transition duration-500 ease-in-out transform border border-transparent rounded-lg appearance-none bg-blue-100 focus:border-blue-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                                        <option disabled selected value> -- select your country --</option>
                                        </option>
                                        @foreach ($countries as $country)

                                            <option
                                                class="block mb-4 text-xs font-bold tracking-wide text-blue-500 uppercase "
                                                value="{{$country->id}}"> {{$country->name}}
                                            </option>
                                        @endforeach

                                    </select>
                                    <!---pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-blue-700-->
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-blue-500">
                                        <svg fill="#ffffff" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                <label class="text-base leading-7 text-blue-500" for="q_city_id"> City </label>
                                <div class="relative ">
                                    <select id="q_city_id" name="city"
                                            class="w-full px-4 py-2 mt-2 text-base text-blue-500 transition duration-500 ease-in-out transform border border-transparent rounded-lg appearance-none bg-blue-100 focus:border-blue-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                                        {{--                                        data placed from sever-> see getCity() function bellow--}}
                                    </select>
                                    <!---pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-blue-700-->
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-blue-500">
                                        <svg fill="#ffffff" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Answer section--}}
                        <div class="flex items-center w-full p-1 mt-4 bg-blue-400">
                            <h3 class=" w-full text-center text-xl">Answers</h3>
                        </div>

                        <div class="flex items-center w-full p-1 mt-4 ">
                            <table class="text-left w-full border-collapse table-auto">
                                <thead>
                                <tr>
                                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        Answer
                                    </th>
                                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        Right
                                    </th>
                                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="ans_table_body">
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">
                                            <textarea name="answer[]" placeholder="Answer" id="" cols="100"
                                                      class=" a_answer w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blue-100 focus:border-blue-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2"
                                            ></textarea>
                                    </td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        <input class="ml-3 a_right_answer" name="right_answer[]" type="checkbox"
                                        >
                                    </td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        <i onclick="removeGrandParent(this)"
                                           class=" ans_row_remove far fa-times-circle  ml-auto text-center text-xl text-red-400 border p-2 border-red-400 rounded transition hover:border-red-600 hover:text-red-600 cursor-pointer"></i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        {{--add more Answer button--}}
                        <div class="flex items-center w-full p-1 mt-4 ">
                            <i id="ans_table_add_btn"
                               class="fas fa-plus-circle ml-auto text-center text-xl text-blue-400 border p-2 border-blue-400 rounded-full transition hover:border-blue-600 hover:text-blue-600 cursor-pointer"></i>
                        </div>


                        <div class="flex items-center w-full pt-4">
                            <button
                                id="q_submit"
                                class="w-full py-3 text-base font-semibold text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">
                                Submit
                            </button>
                        </div>
                    </form>

                </div>
                <div class=" p-12 md:w-1/2 flex flex-col items-start">
                    <table class="text-left w-full border-collapse table-auto">
                        <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Question
                            </th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Answers
                            </th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                active status
                            </th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Type
                            </th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Location
                            </th>
                        </tr>
                        </thead>
                        <tbody id="ans_table_body">
                        @foreach($questions as $q)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">
                                    {{$q->question}}
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    @foreach($q->answers as $key=>$ans)
                                        <p>
                                            @if($ans->right_answer)
                                                <i class="far fa-check-circle text-green-500"></i>
                                            @endif{{$key+1}}. {{$ans->answer}}</p>
                                    @endforeach
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    @if($q->active)
                                        <i class="far fa-check-circle text-green-500"></i>

                                    @else
                                        <i class="far fa-times-circle text-red-500"></i>
                                    @endif
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    {{$q->question_type->name}}
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    {{$q->city->name}}, {{$q->country->name}}
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
            {{--            location section--}}
            <section class="w-11/12 mx-auto">
                <div class="w-full flex justify-end">
                    <button class="px-4 py-1 bg-blue-500 hover:bg-blue-300"> Add Location</button>
                    <button class="px-4 py-1 bg-blue-500 hover:bg-blue-300 ml-6"> Add City</button>
                </div>
{{--                location--}}
                <div class=" mt-6">
                    <form
                        id="q_form"
                        name="q_form"
                        class=" w-full p-10 px-8 pt-6  transition duration-500 ease-in-out transform bg-white border rounded-lg "
                    >
                        @csrf
                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 ">
                                <label class="text-base leading-7 text-blue-500" for="l_country"> Country </label>
                                <input
                                    class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blue-100 focus:border-blue-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2"
                                    id="l_country" type="text" name="country_name" placeholder="Ex. Bangladesh"
                                    required>
                            </div>
                            <div class="flex items-center w-full p-1 mt-4 bg-blue-400">
                                <h3 class=" w-full text-center text-xl">City</h3>
                            </div>

                            <div class="city_section flex flex-col items-center w-full p-1 mt-4 ">
                                <div class="city flex w-full items-end">
                                    <label class=" mr-3 text-base leading-7 text-blue-500 w-full"> City #1
                                        <input
                                            class="l_city w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blue-100 focus:border-blue-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2"
                                            type="text" name="country_name" placeholder="Ex. Dhaka"
                                            required>
                                    </label>
                                    <i onclick="removeCitySection(this)"
                                       class=" ml-3 city_remove far fa-times-circle  ml-auto text-center text-xl text-red-400 border p-2 border-red-400 rounded transition hover:border-red-600 hover:text-red-600 cursor-pointer"></i>
                                </div>
                            </div>
                            {{--add more City button--}}
                            <div class="flex items-center w-full p-1 mt-4 ">
                                <i id="city_add_btn"
                                   class="fas fa-plus-circle ml-auto text-center text-xl text-blue-400 border p-2 border-blue-400 rounded-full transition hover:border-blue-600 hover:text-blue-600 cursor-pointer"></i>
                            </div>

                            <div class="flex items-center w-full pt-4">
                                <button
                                    id="l_submit"
                                    class="w-full py-3 text-base font-semibold text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
{{--                city only--}}
                <div class=" mt-6">
                    <form
                        id="q_form"
                        name="q_form"
                        class=" w-full p-10 px-8 pt-6  transition duration-500 ease-in-out transform bg-white border rounded-lg "
                    >
                        @csrf
                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 ">
                                <label class="text-base leading-7 text-blue-500" for="q_country_id"> Country </label>
                                <div class="relative">
                                    <select id="only_city_country_id"
                                            onchange="getCity(this)"
                                            class="w-full px-4 py-2 mt-2 text-base text-blue-500 transition duration-500 ease-in-out transform border border-transparent rounded-lg appearance-none bg-blue-100 focus:border-blue-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                                        <option disabled selected value> -- select your country --</option>
                                        </option>
                                        @foreach ($countries as $country)

                                            <option
                                                class="block mb-4 text-xs font-bold tracking-wide text-blue-500 uppercase "
                                                value="{{$country->id}}"> {{$country->name}}
                                            </option>
                                        @endforeach

                                    </select>
                                    <!---pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-blue-700-->
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-blue-500">
                                        <svg fill="#ffffff" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center w-full p-1 mt-4 bg-blue-400">
                                <h3 class=" w-full text-center text-xl">City</h3>
                            </div>

                            <div class=" flex flex-col items-center w-full p-1 mt-4 ">
                                <div class="city flex w-full items-end">
                                    <label class=" mr-3 text-base leading-7 text-blue-500 w-full"> City
                                        <input
                                            class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blue-100 focus:border-blue-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2"
                                            id="only_city" type="text" placeholder="Ex. Dhaka"
                                            required>
                                    </label>
                                </div>
                            </div>
                            <div class="flex items-center w-full pt-4">
                                <button
                                    id="city_submit"
                                    class="w-full py-3 text-base font-semibold text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="w-full">
                    <table class="text-left w-full border-collapse table-auto">
                        <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Country
                            </th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                City
                            </th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody id="ans_table_body">
                        @foreach ($countries as $country)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">
                                    {{$country->name}}
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    @foreach($country->cities as $city)
                                        {{$city->name}},
                                    @endforeach
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <i onclick="removeGrandParent(this)"
                                       class=" ans_row_remove fas fa-pen-square ml-auto text-center text-xl text-green-400 border p-2 border-green-400 rounded transition hover:border-green-600 hover:text-green-600 cursor-pointer"></i>
                                    <i onclick="removeGrandParent(this)"
                                       class=" ans_row_remove far fa-times-circle  ml-auto text-center text-xl text-red-400 border p-2 border-red-400 rounded transition hover:border-red-600 hover:text-red-600 cursor-pointer"></i>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </section>
        </main>
    </section>




    <script>

        // side navigation
        var items = document.querySelectorAll('.bar_btn');

        function handleIndicator(el) {
            items.forEach(function (item) {
                item.classList.remove('border-blue-600');
            });
            el.classList.add('border-blue-600');
        }

        items.forEach(function (item, index) {
            item.addEventListener('click', function (e) {
                handleIndicator(e.target);
            });
            item.classList.contains('is-active') && handleIndicator(item);
        });
        // side navigation end

        // multiple answer section add
        document.getElementById('ans_table_add_btn').addEventListener('click', (e) => {
            e.preventDefault()
            $("#ans_table_body").append(`<tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
                            <textarea name="answer[]" placeholder="Answer" id="" cols="100"
                                      class=" a_answer w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blue-100 focus:border-blue-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2"
                            ></textarea>
                </td>
                <td class="py-4 px-6 border-b border-grey-light">
                    <input class="ml-3 a_right_answer"  name="right_answer[]" type="checkbox" >
                </td>
                <td class="py-4 px-6 border-b border-grey-light">
                    <i
                        onclick="removeGrandParent(this)"
                        class="ans_row_remove far fa-times-circle  ml-auto text-center text-xl text-red-400 border p-2 border-red-400 rounded transition hover:border-red-600 hover:text-red-600 cursor-pointer"></i>
                </td>
            </tr>`)

        })
        // multiple answer section add: end

        // remove answer section
        function removeGrandParent(e) {
            e.parentElement.parentElement.remove()
        }

        // remove answer section: end

        // get City based on selected country
        const cityOption = document.getElementById('q_city_id')

        function getCity(e) {
            fetch(`/getcitiesbycountryid/${e.value}`)
                .then(response => response.json())
                .then(data => {
                        let options = '<option disabled selected value> -- select your city -- </option>'
                        data.map((value, index) => {
                            options += `<option
                                        class="block mb-4 text-xs font-bold tracking-wide text-blue-500 uppercase "
                                        value="${value.id}"> ${value.name}
                                    </option>`
                        })
                        cityOption.innerHTML = options

                    }
                );
        }

        // get City based on selected country: end

        // post question
        document.getElementById('q_submit').onclick = function (e) {
            e.preventDefault()
            const answers = []
            const r_a = $('.a_right_answer')
            $('.a_answer').each(function (index) {
                const ans = {
                    answer: $(this).val(),
                    right_answer: r_a[index].checked
                }
                answers.push(ans)
            })
            $.ajax({
                url: '/post_question',
                type: 'POST',
                data: {
                    '_token': "{{csrf_token()}}",
                    question: $('#q_question').val(),
                    question_type: $('#q_question_type').val(),
                    question_active: $('#q_active').prop('checked'),
                    question_country_id: $('#q_country_id').val(),
                    question_city_id: $('#q_city_id').val(),
                    answers: answers
                },
                success: function (data) {
                    alert(data);
                },
                error: function (data) {
                    alert('Something want wrong!');
                }
            });
        }
        // post question: end

        // multiple City section add
        $(document).ready(function(){
            $("#city_add_btn").on('click',function () {
                $(".city_section").append(`
                <div class="city flex w-full items-end">
                    <label class=" mr-3 text-base leading-7 text-blue-500 w-full"> City #${$(".city_section").children().length+1}
                        <input
                            class=" l_city w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blue-100 focus:border-blue-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2"
                             type="text" name="country_name" placeholder="Ex. Dhaka"
                            required>
                    </label>
                    <i onclick="removeCitySection(this)"
                       class=" ml-3 city_remove far fa-times-circle  ml-auto text-center text-xl text-red-400 border p-2 border-red-400 rounded transition hover:border-red-600 hover:text-red-600 cursor-pointer"></i>
                </div>
            `)

            })
        })
        // multiple city section add: end
        // remove city section
        function removeCitySection(e) {
            e.parentElement.remove()
        }
        // remove city section end


        // post location
        $("#l_submit").click((e)=>{
            e.preventDefault()
            const cities = []
            $('.l_city').each(function (index) {
                cities.push($(this).val())
            })
            $.ajax({
                url: '/post_location',
                type: 'POST',
                data: {
                    '_token': "{{csrf_token()}}",
                    country: $('#l_country').val(),
                    cities: cities
                },
                success: function (data) {
                    alert(data);
                },
                error: function (data) {
                    alert('Something want wrong!');
                }
            });
        })
        // post location: end

        $("#city_submit").click((e)=>{
            e.preventDefault()
            $.ajax({
                url: '/post_city',
                type: 'POST',
                data: {
                    '_token': "{{csrf_token()}}",
                    country_id: $('#only_city_country_id').val(),
                    city_name: $('#only_city').val()
                },
                success: function (data) {
                    alert(data);
                },
                error: function (data) {
                    alert('Something want wrong!');
                }
            });
        })

    </script>
@endsection
