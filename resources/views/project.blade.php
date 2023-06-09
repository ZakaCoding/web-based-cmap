<x-app-layout>
    <x-slot name="header">
        <div class="flex place-items-center justify-between relative">
            <div class="block">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Map Board') }}
                </h2>
                <div class="flex text-gray-400 mb-3">
                    <h3>CMAP Key.&nbsp;</h3>
                    <div id="cmap-key" class="font-bold"></div>
                </div>
            </div>

            <div class="flex content-end">
                <button id="save" class="rounded-lg mr-4 p-2 px-4 text-center bg-purple-100 hover:bg-purple-200 hover:text-purple-800 text-purple-700 font-bold">Save</button>
                <button id="update" class="rounded-lg mr-4 p-2 px-4 text-center bg-green-200 hover:bg-green-400 hover:text-green-800 text-green-700 font-bold hidden">Update</button>
                <button class="rounded-lg mr-4 p-2 px-4 text-center bg-white border-2 border-slate-400 text-slate-600 font-bold hover:bg-slate-400 hover:text-black">Export Map</button>
                <button id="create-assignment" class="bg-violet-600 rounded-lg mr-4 p-2 px-4 text-center flex text-white font-bold" data-modal-target="assignment-modal" data-modal-toggle="assignment-modal">
                    <svg viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                        <path d="M14.6666 1L5.49998 10.1667L1.33331 6" stroke="white" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>           
                    Create Assignment
                </button>
                <button id="update-assignment" class="bg-green-100 rounded-lg mr-4 p-2 px-4 text-center flex text-green-600 font-bold hidden">
                    <svg viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                        <path d="M14.6666 1L5.49998 10.1667L1.33331 6" stroke="green" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>           
                    Assignment Was Created
                </button>
            </div>
        </div>
    </x-slot>
    <hr>

    <div class="wrapper relative"> 
        {{-- controller nav --}}
        <div class="controller absolute w-2/5 h-full bg-white px-20 py-10 top-0 show z-10" id="sidenav">
    
            {{-- Button sidebar --}}
            <button id="btn-sidenav" class="bg-violet-600 rounded-lg absolute top-10 -right-5 w-10 h-10 flex justify-center items-center">
                <svg id="sidenav-icon" class="rotate-flip" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 13L1 7L7 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
    
            <h5 class="font-bold text-left mb-5 leading-tight text-lg">Build From</h5>
            <div class="flex mb-6" id="button-tab" data-tabs-toggle="#tabContent" role="tablist">
                <div role="presentation">
                    <button class="rounded-lg py-2 px-4 mr-2 text-center bg-white hover:bg-violet-600 hover:text-white hover:border-violet-700 border-2 border-slate-300 text-slate-600 font-bold focus:outline-none focus:border-2 focus:border-violet-700 focus:text-white focus:bg-violet-600" id="scratch-tab" data-tabs-target="#scratch" type="button" role="tab" aria-controls="scratch" aria-selected="false">Scratch</button>
                </div>
                <div role="presentation">
                    <button class="rounded-lg py-2 px-4 mr-2 text-center bg-white hover:bg-violet-600 hover:text-white hover:border-violet-700 border-2 border-slate-300 text-slate-600 font-bold focus:outline-none focus:border-2 focus:border-violet-700 focus:text-white focus:bg-violet-600" id="file-tab" data-tabs-target="#filePDF" type="button" role="tab" aria-controls="filePDF" aria-selected="false">File PDF</button>
                </div>
            </div>

            <hr class="mb-5">
    
            <div id="tabContent">
                <div class="hidden" id="scratch" role="tabpanel" aria-labelledby="scratch-tab">
                    <div class="mb-5 block">
                        {{-- <h5 class="font-bold text-left mb-5 leading-tight text-lg">Build From</h5> --}}
                        <form action="#">
                            <div class="mb-3">
                                <label for="super_concept" class="block mb-2 font-bold text-left mb-5 leading-tight text-lg text-gray-900 dark:text-white">
                                    Super Concept
                                </label>
                                <input type="text" id="super_concept" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Super concept (optional)" required>
                                <small class="text-gray-400 leading-6">The super concept is the most important concept in the map. There can only be one super concept per map. This is so your map content can focus on a single idea.</small>
                            </div>

                            <h5 class="font-bold text-left mb-5 leading-tight text-lg">Concept</h5>
                            <div class="mb-2">
                                <input type="text" id="concept" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Concept" required>
                            </div>
                            {{-- <div class="mb-2">
                                <input type="text" id="link_pharase" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Link Pharase" required>
                            </div> --}}
                        </form>
                    </div>
                    <hr class="mb-3">
                    <div class="mb-3 flex items-center">
                        <svg fill="none" class="h-5 w-5 stroke-2" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"></path>
                        </svg>
                        &nbsp;
                        <h5 class="font-bold text-left text-lg">
                            Tips
                        </h5>
                    </div>
                    <div class="relative rounded p-3 bg-gray-100 box-content">
                        <div class="text-gray-400">
                            <Strong>How to make node and link :</Strong>
                            <ul class="list-disc list-inside">
                                <li>Press enter every input to make node or link</li>
                                <li>Hover cursor to border on a node then drag and drop to another node to make node connected.</li>
                            </ul>

                            <p>
                                <strong>The fast way</strong> <br> you can double click on canvas
                            </p>
                        </div>
                    </div>
                </div>
    
                <div class="hidden" id="filePDF" role="tabpanel" aria-labelledby="file-tab">
                    <h5 class="font-semi-bold text-md font-extrabold">Choose your file</h5>
                    <p class="font-sm text-slate-500 mb-6">You can upload your pdf file and create concept.</p>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PDF(MAX. 2048)</p>
                            </div>
                            <input id="dropzone-file" type="file" draggable="true" class="hidden" />
                        </label>
                    </div>
                    
                    {{-- pdf viewer --}}
                    <iframe src="{{ asset('/assets/sample.pdf#view=FitH&toolbar=0') }}" class="mt-5 w-full h-full" frameborder="0" style="min-height: 500px;"></iframe>
                </div>
            </div>
        </div>
    
        {{-- canvas --}}
        <div id="canvas" style="width: 100%; height: 100vh" class="static">
        </div>

        {{-- toast --}}
        <div id="toast-success" class="fixed bottom-10 right-10 z-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 animate__animated hidden" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">Concept has been saved</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>

        {{-- Assignment modal --}}
        <div id="assignment-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="assignment-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Create Assignment</h3>
                        <form id="assignment" action="{{ route('create.assignment') }}" class="space-y-6" method="POST">
                            <div>
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Focus Question <br><p class="text-gray-400">Example: What Is Concept Mapping</p></label>
                                <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Focus Question (required)" required>
                            </div>
                            <div class="grid w-full gap-6 md:grid-cols-2">
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due date</label>
                                    <div class="relative max-w-sm">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                        </div>
                                        <input datepicker id="due-date" name="due-date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                    </div>
                                </div>
                                <div>
                                    <label for="timer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Timer</label>
                                    <input type="number" name="timer" id="timer" min="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Timer in minutes" required>
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
                                        <input type="radio" id="hosting-big" name="method" value="unscored" class="hidden peer">
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
                            <button id="assignment-button" type="button" class="text-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <div id="default-state" class="">
                                    Create Assignment
                                </div>
                                <div id="processing-state" class="flex aligns-center justify-center hidden">
                                    {{-- animate spin --}}
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Processing
                                </div>
                            </button>
                        </form>
                        <div id="success-state" class="hidden">
                            <div class="rounded-lg p-3 bg-gray-50 dark:bg-gray-600 dark:text-white mb-3">
                                <h3 class="font-bold text-md leading-tight mb-3 text-gray-400">
                                    Assignment was create successfully
                                </h3>
                                <p class="text-gray-400 mb-3">
                                    Learner can take assignment until due date. You can check on dashboard to know learner progress. Share this Concept Map Key to take assignment
                                    <a href="{{ url('/assignment?key=') }}" id="ckey"><strong id="key"></strong></a>
                                </p>
                                <button class="flex items-center justify-center text-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="copyLink()">
                                    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244"></path>
                                      </svg> &nbsp;
                                    Copy Link
                                </button>
                            </div>
                            <small class="text-gray-400">or share to</small>
                            <div class="my-3 space-y-3 block">
                                <div class="flex mb-2 items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <div id="whatsapp-icon" class="w-6 h-6" onmouseover="waIconPlay()"></div>
                                    <span class="flex-1 ml-3 whitespace-nowrap">WhatsApp</span>
                                </div>
                                <div class="flex mb-2 items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <div id="email-icon" class="w-6 h-6" onmouseover="mailIconPlay()"></div>
                                    <span class="flex-1 ml-3 whitespace-nowrap">Email</span>
                                </div>
                            </div>
                            <div>
                                <a href="#" class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                                    <svg class="w-3 h-3 mr-2" aria-hidden="true" focusable="false" data-prefix="far" data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm107.244-255.2c0 67.052-72.421 68.084-72.421 92.863V300c0 6.627-5.373 12-12 12h-45.647c-6.627 0-12-5.373-12-12v-8.659c0-35.745 27.1-50.034 47.579-61.516 17.561-9.845 28.324-16.541 28.324-29.579 0-17.246-21.999-28.693-39.784-28.693-23.189 0-33.894 10.977-48.942 29.969-4.057 5.12-11.46 6.071-16.666 2.124l-27.824-21.098c-5.107-3.872-6.251-11.066-2.644-16.363C184.846 131.491 214.94 112 261.794 112c49.071 0 101.45 38.304 101.45 88.8zM298 368c0 23.159-18.841 42-42 42s-42-18.841-42-42 18.841-42 42-42 42 18.841 42 42z"></path></svg>
                                    Thank you for using Open CMAP, any question go QA page.
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</x-app-layout>

@vite(['resources/js/cmap.js'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.5/lottie.min.js"></script>
{{-- <script src="{{ asset('assets/icon/animated/icons8-gmail-logo.json') }}"></script>
<script src="{{ asset('assets/icon/animated/icons8-whatsapp.json') }}"></script> --}}
<script>

    // remove session if user leave page
    window.addEventListener('beforeunload', () => {
        sessionStorage.clear()
    });
    
    // sidenav
    const btnSidenav = document.querySelector('#btn-sidenav')
    const sidenav = document.querySelector('#sidenav')
    const icons = document.querySelector('#sidenav-icon')

    btnSidenav.addEventListener('click', function() {
        sidenav.classList.toggle('hide')
        icons.classList.toggle('deactive')
    })

    // animated icon
    const whatsappIcon = document.querySelector('#whatsapp-icon')
    const emailIcon = document.querySelector('#email-icon')

    const whatsappAnim = lottie.loadAnimation({
        container: whatsappIcon,
        renderer: 'svg',
        loop: false,
        autoplay: false,
        path: '{{ asset('assets/icon/animated/icons8-whatsapp.json') }}'
    });

    const emailAnim = lottie.loadAnimation({
        container: emailIcon,
        renderer: 'svg',
        loop: false,
        autoplay: false,
        path: '{{ asset('assets/icon/animated/icons8-gmail-logo.json') }}'
    });

    function waIconPlay()
    {
        whatsappAnim.play()
    }

    function mailIconPlay(){
        emailAnim.play()
    }

    function copyLink()
    {
        const key = document.querySelector('#key').innerText
        var url = '{{ url("/assignment?key=") }}' + key

        navigator.clipboard.writeText(url);
    }

    function shareToWA()
    {

    }

    function shareToMail()
    {

    }
</script>
