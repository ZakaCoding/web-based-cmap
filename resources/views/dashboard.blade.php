<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
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
                    <a href="{{ route('project') }}" class="block max-w-md p-6 bg-white border border-gray-200  m-4 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text">Create Your own<br><span class="text-blue-500">Concept Mapping</span></h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">You can create concept mapping from scratch or file pdf</p>
                    </a>

                    <a href="#" class="block max-w-md p-6 bg-white border border-gray-200  m-4 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-green-600 dark:text-white text">Turn Assignment Concept Mapping from Assasments</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            You can turn assignment from assaments. just need to enter <strong>Concept Mapping Key</strong>
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
