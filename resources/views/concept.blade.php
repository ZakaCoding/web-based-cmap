<x-app-layout>
    <x-slot name="header">
        <div class="row place-items-center relative">
            <div class="col-sm-12 col-lg-6  mb-4 block">
                @php
                    //  show only super concept from model data
                    $nodeData = json_decode($concept->model)->nodeDataArray;
                    foreach($nodeData as $data)
                    {
                        $superConcept = "Super Concept";
                        if(property_exists($data, 'category'))
                        {
                            $superConcept =  $data->text;
                            break;
                        } 
                    }
                @endphp
                <nav class="flex mb-2" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center">
                        <li class="inline-flex items-center">
                            <a href="#" class="inline-flex items-center text-sm font-bold text-violet-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <span class="mx-2 text-gray-400">/</span>
                                <a href="#" class="ml-1 text-sm font-bold text-violet-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <span class="mx-2 text-gray-400">/</span>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ __($superConcept) }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
  
                <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __($superConcept) }}
                </h2>
            </div>

            <div class="col-sm-12 col-lg-6  mb-4 flex items-center content-center justify-end">
                <button id="reverse-btn" class="bg-violet-600 rounded-lg mr-3 p-2 px-4 text-center flex items-center text-white font-bold focus:outline-none focus:ring focus:ring-violet-300">
                    <svg id="play-icon" class="w-6 h-6 stroke-2 mr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z"></path>
                    </svg>
                    <svg id="stop-icon" class="h-6 w-6 mr-2 hidden" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 7.5A2.25 2.25 0 017.5 5.25h9a2.25 2.25 0 012.25 2.25v9a2.25 2.25 0 01-2.25 2.25h-9a2.25 2.25 0 01-2.25-2.25v-9z"></path>
                    </svg>
                    Reverse Concept
                </button>
                <div style="border-left: 2px solid #eaeaea; height: 30px" class="mr-3"></div>
                <div class="flex items-center">
                    <svg class="h-8 w-8 mr-2 stroke-green-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="block text-gray-400 leading-tight text-sm">
                        {{ date('M d, Y h:m:i',strtotime($concept->created_at)) }} <br>
                        {{ $concept->email }}
                    </p>
                </div>
            </div>
        </div>
    </x-slot>
    <hr>

    <div class="wrapper relative"> 
        {{-- controller nav --}}
        <div class="controller absolute w-11/12 lg:w-2/5 h-full bg-white px-4 lg:px-20 py-10 top-0 hide z-10" id="sidenav-concept">
    
            {{-- Button sidebar --}}
            <button id="btn-sidenav" class="bg-violet-600 rounded-lg absolute top-10 -right-5 w-10 h-10 flex justify-center items-center">
                <svg id="sidenav-icon" class="deactive" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 13L1 7L7 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
    
            <h5 class="font-bold text-left mb-3 leading-tight text-lg">User Log</h5>
            <p class="text-gray-400 mb-5">
                You can track reverse concept from this log.
            </p>
            <hr class="mb-5">

            
            <div class="h-2/3 overflow-auto scrollbar">
                <div class="h-max">
                    @php
                        $logs = json_decode($concept->model, true)['log'];
                    @endphp
    
                    @foreach ($logs as $item)
                        <p style="cursor: pointer" class="p-2 rounded-lg hover:bg-gray-200">
                            <span class="font-bold text-gray-400 hover:text-blue-600 hover:underline">[{{ $item['timestamp'] }}]</span>
                            {{ $item['data'] }}
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    
        {{-- canvas --}}
        <div id="canvas" style="width: 100%; height: 100vh" class="static">
        </div>
    </div>
</x-app-layout>

@vite(['resources/js/concept.js'])
<script>
    // sidenav
    const btnSidenav = document.querySelector('#btn-sidenav')
    const sidenav = document.querySelector('#sidenav-concept')
    const icons = document.querySelector('#sidenav-icon')

    btnSidenav.addEventListener('click', function() {
        sidenav.classList.toggle('hide')
        icons.classList.toggle('active')
    })

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
