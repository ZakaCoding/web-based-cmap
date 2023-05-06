<x-app-layout>
    <x-slot name="header">
        <div class="flex place-items-center justify-between relative">
            <div class="block">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Project') }}
                </h2>
                <div class="flex text-gray-400 mb-3">
                    <h3>CMAP Key.&nbsp;</h3>
                    <div id="cmap-key" class="font-bold"></div>
                </div>
            </div>

            <div class="flex content-end">
                <button id="save" class="rounded-lg mr-4 p-2 px-4 text-center bg-purple-100 hover:bg-purple-200 hover:text-purple-800 text-purple-700 font-bold">Save</button>
                <button class="rounded-lg mr-4 p-2 px-4 text-center bg-white border-2 border-slate-400 text-slate-600 font-bold hover:bg-slate-400 hover:text-black">Export Map</button>
                <button class="bg-violet-600 rounded-lg mr-4 p-2 px-4 text-center flex text-white font-bold">
                    <svg viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                        <path d="M14.6666 1L5.49998 10.1667L1.33331 6" stroke="white" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>           
                    Create Assignment
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
                <svg id="sidenav-icon" class="rotate-flip active" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
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
    </div>
</x-app-layout>

<script>
    // sidenav
    const btnSidenav = document.querySelector('#btn-sidenav')
    const sidenav = document.querySelector('#sidenav')
    const icons = document.querySelector('#sidenav-icon')

    btnSidenav.addEventListener('click', function() {
        sidenav.classList.toggle('hide')
        icons.classList.toggle('deactive')
    })
</script>
