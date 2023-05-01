<x-app-layout>
    <x-slot name="header">
        <div class="flex place-items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Assignment') }}
            </h2>

            <div class="flex content-end">
                <button class="rounded-lg mr-4 p-2 px-4 text-center bg-purple-100 hover:bg-purple-200 hover:text-purple-800 text-purple-700 font-bold">Save as draft</button>
                <button class="rounded-lg mr-4 p-2 px-4 text-center bg-white border-2 border-slate-400 text-slate-600 font-bold hover:bg-slate-400 hover:text-black">Export Map</button>
                <button class="bg-green-600 rounded-lg p-2 px-4 text-center flex text-white font-bold">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 stroke-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg> --}}
                    <svg viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                        <path d="M14.6666 1L5.49998 10.1667L1.33331 6" stroke="white" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>           
                    Assign Concept
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
    
            <h5 class="font-bold text-left mb-5 leading-tight text-lg">Assignment Concept Mapping</h5>
            <hr class="mb-3">
            <div class="block mb-6">
                <form action="#">
                    <div class="relative mb-5">
                        <label for="super_concept" class="block mb-2 font-bold text-left mb-5 leading-tight text-md text-gray-900 dark:text-white">
                            Concept Map Key <br>
                            <small class="text-gray-400">e.g KZE-IUP-CMAP</small>
                        </label>
                        <input type="text" id="super_concept" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter concept map key" required>
                    </div>

                    <div class="relative mb-3">
                        <label for="super_concept" class="block mb-2 font-bold text-left mb-5 leading-tight text-md text-gray-900 dark:text-white">Learner</label>
                        <input type="text" id="super_concept" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your name" required>
                    </div>

                    <div class="relative mb-3">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                        </div>
                        <input type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@mail.com">
                      </div>
                </form>
            </div>

            <hr class="mb-5">
    
            <div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, fuga nobis quam tempore officiis consectetur mollitia quae excepturi quibusdam cumque dolores molestiae itaque. Labore, rem. Quas labore corrupti iusto saepe.</p>
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
</script>
