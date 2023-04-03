<x-app-layout>
    <x-slot name="header">
        <div class="flex place-items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Project') }}
            </h2>

            <div class="flex content-end">
                <button class="rounded-lg mr-4 p-2 px-4 text-center bg-purple-100 hover:bg-purple-200 hover:text-purple-800 text-purple-700 font-bold">Save as draf</button>
                <button class="rounded-lg mr-4 p-2 px-4 text-center bg-white border-2 border-slate-400 text-slate-600 font-bold hover:bg-slate-400 hover:text-black">Export Map</button>
                <button class="bg-violet-600 rounded-lg p-2 px-4 text-center flex text-white font-bold">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 stroke-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg> --}}
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
    
            <div id="tabContent">
                <div class="hidden" id="scratch" role="tabpanel" aria-labelledby="scratch-tab">
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia sequi voluptate modi voluptas magnam dolore libero soluta, excepturi rerum delectus eum nulla! Alias animi rem eaque! Voluptatum inventore blanditiis voluptates.
                        Mollitia eaque voluptatem excepturi non consequatur saepe quaerat, ut fuga molestias ea voluptatibus corrupti reiciendis, exercitationem veritatis recusandae. Ducimus repudiandae laudantium totam corporis similique eum, adipisci veritatis aspernatur molestiae saepe.
                        Nesciunt, iste a. Quaerat facilis laudantium praesentium magnam nisi non accusantium nulla odio et iste eius consequatur inventore aspernatur nam animi deleniti doloribus facere incidunt quidem dolorum quod, nihil commodi!
                    </p>
                </div>
    
                <div class="hidden" id="filePDF" role="tabpanel" aria-labelledby="file-tab">
                    <h5 class="font-semi-bold text-md font-extrabold">Choose your file</h5>
                    <p class="font-sm text-slate-500 mb-6">You can upload your pdf file and create concept.</p>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div> 
                </div>
            </div>
        </div>
    
        {{-- canvas --}}
        <div id="canvas" style="width: 100%; height: 100vh" class="static">
    
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

    // tabs
    const tabElements = [
        {
            id: 'scratch',
        },
        {
            id: 'filePDF',
        },
    ];
</script>
