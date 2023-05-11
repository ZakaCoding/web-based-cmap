<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 mb-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100 font-black">
                    {{ __("Hello, Welcome Back!") }}
                </div>

                {{-- card --}}
                <div class="grid grid-cols-3 grid-flow-col w-full auto-cols-max md:auto-cols-max text-center mb-4">
                    <div class="block max-w-md p-6 m-4 text-left">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text">Open CMAP-Tools for Assignment</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>
                    <div class="block max-w-md p-6 bg-white border border-gray-200 m-4 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text">Create Your own<br><span class="text-blue-500">Concept Mapping</span></h5>
                        <p class="font-normal mb-3 text-gray-700 dark:text-gray-400">You can create concept mapping from scratch or file pdf</p>
                        <a href="{{ route('project') }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Click to build
                            </span>
                        </a>
                    </div>

                    <div class="block max-w-md p-6 bg-white border border-gray-200  m-4 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-green-600 dark:text-white text">Turn Assignment Concept Mapping from Assasments</h5>
                        <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">
                            You can turn assignment from assaments. just need to enter <strong>Concept Mapping Key</strong>
                        </p>

                        <a href="{{ route('assignment') }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Turn Assignment
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <div class="block mb-5">
                    <h3 class="font-bold leading-tight text-lg">Concept Mapping</h3>
                    <p class="font-light text-gray-600">Browse a list of Concept Mapping you have been create.</p>
                </div>

                <div class="relative overflow-x-auto shadow-md rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            List all concept map
                            {{-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p> --}}
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Super Concept
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Interactions
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date Upload
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Last Update
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($conceptData as $concept)    
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @php
                                        //  show only super concept from model data
                                        $nodeData = json_decode($concept->model)->nodeDataArray;
                                        foreach($nodeData as $data)
                                        {
                                            $superConcept = "Uknown";
                                            if(property_exists($data, 'category'))
                                            {
                                                $superConcept =  $data->text;
                                                break;
                                            } 
                                        }
                                    @endphp
                                    <a href="{{ url('/project?key=' . $concept->key) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ $superConcept }}</a>
                                </th>
                                <td class="px-6 py-4">
                                    0
                                </td>
                                <td class="px-6 py-4">
                                    @if ($concept->status === 'Assign to Test')
                                        <div data-modal-target="defaultModal" 
                                            data-modal-toggle="defaultModal" 
                                            class="text-blue-600 dark:text-blue-500 hover:underline cursor-pointer" 
                                            onclick="load('{{ $concept->key }}')">

                                            {{ $concept->status }}
                                            
                                        </div>
                                    @else
                                        {{ $concept->status }}
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ date('M d, Y. h:iA', strtotime($concept->created_at)) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date('M d, Y. h:iA', strtotime($concept->updated_at)) }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Modal --}}
                    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 id="focus-question" class="text-xl font-semibold text-gray-900 dark:text-white">
                                        {{-- Generate javascript --}}
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-3 space-y-6">
                                    <form action="#" class="space-y-6">
                                        <div class="grid w-full gap-6 md:grid-cols-2">
                                            <div>
                                                <label for="question" class="block mb-3 text-sm font-medium text-gray-900 dark:text-white">Focus Question</label>
                                                <input type="text" name="question" id="question" class="read-only:bg-gray-100 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" readonly required>
                                            </div>
                                            <div>
                                                <h3 class="mb-3 text-sm font-bold text-gray-900 dark:text-white">
                                                    Keycode <br> 
                                                    <p class="helper-text text-gray-400 font-light text-sm">share this keycode for learner take assignment</p>
                                                </h3>
                                                <div class="flex items-center justify-between">
                                                    <a href="" id="keycode" class="font-bold text-lg hover:underline decoration-sky-500 decoration-4"></a>
                                                    <button type="button" id="copy-keycode" class="p-1 px-6 rounded-lg bg-gray-200 text-gray-600 text-sm font-bold hover:bg-blue-600 hover:text-white" onclick="copyLink()">Copy</button>                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid w-full gap-6 md:grid-cols-2">
                                            <div>
                                                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due date</label>
                                                <div class="relative max-w-sm">
                                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                                    </div>
                                                    <input datepicker id="date" name="due-date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 read-only:bg-gray-100" placeholder="Select date" required readonly>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="timer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Timer</label>
                                                <input type="number" name="timer" id="timer" min="10" class="read-only:bg-gray-100 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Timer in minutes" required readonly>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="mb-5 text-sm font-medium text-gray-900 dark:text-white">Assasment Method <br> <p class="text-gray-400"></p></h3>
                                            <ul class="grid w-full gap-6 md:grid-rows-1">
                                                <li>
                                                    <input type="radio" id="hosting-small" name="method" value="scored" class="hidden peer" required>
                                                    <label for="hosting-small" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                        <div class="block">
                                                            <div class="w-full text-lg font-semibold">Scored</div>
                                                            <div class="w-full">Learner rebuild concept mapping and make all node connected. Then system will compare concept map and give score</div>
                                                        </div>
                                                        <svg aria-hidden="true" class="w-6 h-6 ml-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="hosting-big" name="method" value="unscored" class="hidden peer" required>
                                                    <label for="hosting-big" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                        <div class="block">
                                                            <div class="w-full text-lg font-semibold">Unscored</div>
                                                            <div class="w-full">Learner rebuild concept mapping from scratch with hint. Scoring system, Teacher or Owner Concept Map will review one-by-one concept mapping from learner and give score manually</div>
                                                        </div>
                                                        <svg aria-hidden="true" class="w-6 h-6 ml-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <div class="block mb-5">
                    <h3 class="font-bold leading-tight text-lg">Assignment</h3>
                    <p class="font-light text-gray-600">Browse a list of Assasment that you have done to take.</p>
                </div>

                <div class="relative overflow-x-auto shadow-md rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            List Assasment
                            {{-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p> --}}
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Your score
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date Upload
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Water Cycle Process
                                </th>
                                <td class="px-6 py-4">
                                    0/100
                                </td>
                                <td class="px-6 py-4">
                                    Mei 12, 2023
                                </td>
                            </tr>
                            <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Concept Maps
                                </th>
                                <td class="px-6 py-4">
                                    0/100
                                </td>
                                <td class="px-6 py-4">
                                    Mei 8, 2023
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function load(key)
        {

            // call laravel API to load data model
            let url = '/api/load-data-assignment/' + key
            fetch(url, {
                method : 'GET',
                headers : {
                    'Content-Type' : 'application/json'
                },
            })
            .then(response => response.json())
            .then(response => {
                // Handle response from laravel api
                const assignment = response.data

                // get all modal data
                const focusQuestionEl = document.querySelector('#focus-question')
                const questionEl = document.querySelector('#question')
                const dateEl = document.querySelector('#date')
                const timerEl = document.querySelector('#timer')
                const focusMethod = document.querySelectorAll('input[name="method"]')
                const keycodeEl = document.querySelector('#keycode')

                // pass data
                focusQuestionEl.innerHTML = assignment.focus_question
                questionEl.value = assignment.focus_question
                dateEl.value = assignment.due_date
                timerEl.value = assignment.timer
                keycodeEl.innerHTML = assignment.keycode
                keycodeEl.href = "{{ url('/assignment?key=') }}" + assignment.keycode
                focusMethod[1].checked = true;

                if(assignment.method === 'scored')
                {
                    focusMethod[0].checked = true;
                }

                // show log
                // console.log()
                
            })
            .catch(error => {
                console.error(error)
            });
        }

        function copyLink()
        {
            const key = document.querySelector('#keycode').innerText
            var url = '{{ url("/assignment?key=") }}' + key

            navigator.clipboard.writeText(url);
        }
    </script>
</x-app-layout>
