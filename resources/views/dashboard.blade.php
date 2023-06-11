<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100 font-black">
                    {{ __("Hello, Welcome Back!") }}
                </div>

                {{-- card --}}
                <div class="row text-center mb-4 px-4">
                    <div class="col-sm-12 col-lg-4 mb-4 p-3 block text-left">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text">Open CMAP-Tools for Assignment</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2023 so far, in reverse chronological order.</p>
                    </div>
                    <div class="col-sm-12 col-lg-8">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 mb-4">
                                <div class="p-3 block bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text">Create Your own<br><span class="text-blue-500">Concept Mapping</span></h5>
                                    <p class="font-normal mb-3 text-gray-700 dark:text-gray-400">You can create concept mapping from scratch or file pdf</p>
                                    <a href="{{ route('project') }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                            Click to build
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6 mb-4">
                                <div class="p-3 block bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
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
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <div class="block mb-3 px-4">
                    <h3 class="font-bold leading-tight text-lg">Concept Mapping</h3>
                    <p class="font-light text-gray-600">Browse a list of Concept Mapping you have been create.</p>
                </div>

                <div class="relative overflow-x-auto shadow-sm rounded-lg">
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
                                <th scope="col" class="px-6 py-3" colspan="2">
                                    Last Update
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- check if concept empty --}}
                            @if (count($conceptData) === 0)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td scope="row" colspan="5">
                                    <h3 class="text-center py-10 text-lg">
                                        There was no record for concept Mapping
                                    </h3>
                                </td>
                            </tr>
                            @endif

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
                                    <button class="w-6 h-6" data-dropdown-toggle="dropdownAction{{ $concept->id }}">
                                        <svg class="stroke-2" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z"></path>
                                        </svg>
                                    </button>
                                    {{-- Dropdown action --}}
                                    <div id="dropdownAction{{ $concept->id }}" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                          <li class="flex items-center justify-content-center px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                            </svg>
                                            <div data-modal-target="modal-delete-{{$concept->id}}" data-modal-toggle="modal-delete-{{$concept->id}}" class="block cursor-pointer px-4 py-2">Delete</div>
                                          </li>
                                          <li class="flex items-center justify-content-center px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z"></path>
                                            </svg>
                                            {{-- <a href="{{ url('/concept-map/'.$concept->key) }}" class="block px-4 py-2">Share</a> --}}
                                            <div data-modal-target="modal-share-{{$concept->id}}" data-modal-toggle="modal-share-{{$concept->id}}" class="block cursor-pointer px-4 py-2">Share</div>
                                          </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            {{-- modal dialog for delete concept --}}
                            <div id="modal-delete-{{ $concept->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="flex flex-col p-8 bg-white shadow-md hover:shodow-lg rounded-2xl">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-16 h-16 rounded-2xl p-3 border border-blue-100 text-blue-400 bg-blue-50" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <div class="flex flex-col ml-3">
                                                <div class="font-medium leading-none">Delete Your Concept Map ?</div>
                                                <p class="text-sm text-gray-600 leading-none mt-1">By deleting your concept you will lose your concept mapping data</p>
                                            </div>
                                        </div>
                                        <a href="{{ url('/concept-map/delete/' . $concept->id) }}"  class="flex-no-shrink bg-red-500 px-5 ml-4 py-2 text-sm shadow-sm hover:ring-offset-2 hover:ring-2 hover:ring-red-500 font-medium tracking-wider border-2 border-red-500 text-white rounded-full">Delete</a>
                                    </div>
                                </div>
                            </div>

                            {{-- Modal dialog for share reverse concept --}}
                            <div id="modal-share-{{$concept->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="modal-share-{{$concept->id}}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <!-- Modal header -->
                                        <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                                                Share this Concept Map
                                            </h3>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-6">
                                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Invite other to review your concept map</p>
                                            <ul class="my-4 space-y-3">
                                                <li>
                                                    <a href="#" class="flex items-center cursor-pointer p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5" data-name="Layer 1" viewBox="0 0 24 24" id="whatsapp-alt"><path fill="#00C35D" d="M22,6.55a12.61,12.61,0,0,0-.1-1.29,4.29,4.29,0,0,0-.37-1.08,3.66,3.66,0,0,0-.71-1,3.91,3.91,0,0,0-1-.71,4.28,4.28,0,0,0-1.08-.36A10.21,10.21,0,0,0,17.46,2H6.55a12.61,12.61,0,0,0-1.29.1,4.29,4.29,0,0,0-1.08.37,3.66,3.66,0,0,0-1,.71,3.91,3.91,0,0,0-.71,1,4.28,4.28,0,0,0-.36,1.08A10.21,10.21,0,0,0,2,6.54C2,6.73,2,7,2,7.08v9.84c0,.11,0,.35,0,.53a12.61,12.61,0,0,0,.1,1.29,4.29,4.29,0,0,0,.37,1.08,3.66,3.66,0,0,0,.71,1,3.91,3.91,0,0,0,1,.71,4.28,4.28,0,0,0,1.08.36A10.21,10.21,0,0,0,6.54,22H17.45a12.61,12.61,0,0,0,1.29-.1,4.29,4.29,0,0,0,1.08-.37,3.66,3.66,0,0,0,1-.71,3.91,3.91,0,0,0,.71-1,4.28,4.28,0,0,0,.36-1.08A10.21,10.21,0,0,0,22,17.46c0-.19,0-.43,0-.54V7.08C22,7,22,6.73,22,6.55ZM12.23,19h0A7.12,7.12,0,0,1,8.8,18.1L5,19.1l1-3.72a7.11,7.11,0,0,1-1-3.58A7.18,7.18,0,1,1,12.23,19Zm0-13.13A6,6,0,0,0,7.18,15l.14.23-.6,2.19L9,16.8l.22.13a6,6,0,0,0,3,.83h0a6,6,0,0,0,6-6,6,6,0,0,0-6-6Zm3.5,8.52a1.82,1.82,0,0,1-1.21.85,2.33,2.33,0,0,1-1.12-.07,8.9,8.9,0,0,1-1-.38,8,8,0,0,1-3.06-2.7,3.48,3.48,0,0,1-.73-1.85,2,2,0,0,1,.63-1.5.65.65,0,0,1,.48-.22H10c.11,0,.26,0,.4.31s.51,1.24.56,1.33a.34.34,0,0,1,0,.31,1.14,1.14,0,0,1-.18.3c-.09.11-.19.24-.27.32s-.18.18-.08.36a5.56,5.56,0,0,0,1,1.24,5,5,0,0,0,1.44.89c.18.09.29.08.39,0s.45-.52.57-.7.24-.15.4-.09,1.05.49,1.23.58.29.13.34.21A1.56,1.56,0,0,1,15.73,14.36Z"></path></svg>
                                                        <span class="flex-1 ml-3 whitespace-nowrap">WhatsApp</span>
                                                        <span class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Popular</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <div class="flex items-center cursor-pointer p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white" onclick="copyLink('{{ url("/concept-map/$concept->key") }}', this)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5" viewBox="0 0 24 24" id="external-link-alt"><path fill="#0B8DFF" d="M18,10.82a1,1,0,0,0-1,1V19a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V8A1,1,0,0,1,5,7h7.18a1,1,0,0,0,0-2H5A3,3,0,0,0,2,8V19a3,3,0,0,0,3,3H16a3,3,0,0,0,3-3V11.82A1,1,0,0,0,18,10.82Zm3.92-8.2a1,1,0,0,0-.54-.54A1,1,0,0,0,21,2H15a1,1,0,0,0,0,2h3.59L8.29,14.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L20,5.41V9a1,1,0,0,0,2,0V3A1,1,0,0,0,21.92,2.62Z"></path></svg>
                                                        <span class="flex-1 ml-3 whitespace-nowrap">Copy Link</span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div>
                                                <a href="#" class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                                                    <svg aria-hidden="true" class="w-3 h-3 mr-2" aria-hidden="true" focusable="false" data-prefix="far" data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm107.244-255.2c0 67.052-72.421 68.084-72.421 92.863V300c0 6.627-5.373 12-12 12h-45.647c-6.627 0-12-5.373-12-12v-8.659c0-35.745 27.1-50.034 47.579-61.516 17.561-9.845 28.324-16.541 28.324-29.579 0-17.246-21.999-28.693-39.784-28.693-23.189 0-33.894 10.977-48.942 29.969-4.057 5.12-11.46 6.071-16.666 2.124l-27.824-21.098c-5.107-3.872-6.251-11.066-2.644-16.363C184.846 131.491 214.94 112 261.794 112c49.071 0 101.45 38.304 101.45 88.8zM298 368c0 23.159-18.841 42-42 42s-42-18.841-42-42 18.841-42 42-42 42 18.841 42 42z"></path></svg>
                                                    Why do you need to share concept Map?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                                    <a href="" id="keycode" class="font-bold text-blue-700 text-lg hover:underline decoration-sky-500 decoration-4"></a>
                                                    <button type="button" id="copy-keycode" class="p-1 px-6 rounded-lg bg-gray-200 text-gray-600 text-sm font-bold hover:bg-blue-600 hover:text-white" onclick="copyLink('{{ url("/assignment?key=") }}', this)">Copy</button>
                                                </div>
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

            <div>
                <div class="block mb-3 px-4">
                    <h3 class="font-bold leading-tight text-lg">Assignment</h3>
                    <p class="font-light text-gray-600">Browse a list of Assasment that you have done to take.</p>
                </div>

                <div class="relative overflow-x-auto shadow-sm rounded-lg">
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

    {{-- All alert or toast here --}}

    {{-- get success or error status when delete concept --}}
    @if (\Session::has('success'))

    <div id="toast-success" class="fixed bottom-10 right-10 z-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 animate__animated animate__fadeInUp" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">
                {{-- message --}}
                <p>{{ \Session::get('success') }}</p>
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>

    @endif

    @if (\Session::has('errors'))

    <div id="toast-warning" class="fixed bottom-10 right-10 z-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 animate__animated animate__fadeInUp" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Warning icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">
                {{-- message --}}
                <p>{{ \Session::get('errors') }}</p>
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>

    @endif

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

        function copyLink(uri, event)
        {
            event.preventDefault;

            const key = document.querySelector('#keycode').innerText
            var url = uri + key

            var element = event.getElementsByTagName('span')[0];

            // coppy link
            navigator.clipboard.writeText(url);

            // change text when success copy
            element.innerText = 'Link Copied'
        }
    </script>
</x-app-layout>
