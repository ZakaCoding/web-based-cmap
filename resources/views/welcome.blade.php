<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <link rel="shortcut icon" href="{{ asset('assets/logo/favicon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}
        </style>

        <style>
            #scroller::-webkit-scrollbar {
                display: none;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="w-11/12 max-w-7xl mx-auto lg:px-8">
                <div class="flex justify-center sm:mt-0 lg:mt-16">
                    <svg width="101" height="100" viewBox="0 0 101 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.64373 0H90.6511C95.9772 0 100.295 4.31765 100.295 9.64373V89.6867C100.295 95.0128 95.9772 99.3305 90.6511 99.3305H9.64373C4.31765 99.3305 0 95.0128 0 89.6867V9.64373C0 4.31765 4.31765 0 9.64373 0ZM84.2593 50.372C84.2815 47.7741 84.0628 45.128 83.4428 42.506C82.8582 39.897 81.9384 37.2543 80.6732 34.845C79.4304 32.4257 77.9304 30.1585 76.1652 28.1413C74.4092 26.1162 72.4596 24.2532 70.266 22.6765C65.9264 19.4848 60.7241 17.1955 54.9508 16.3759C54.4517 16.2837 53.9357 16.2459 53.4195 16.2081C53.2018 16.1921 52.984 16.1761 52.7674 16.1561C52.0354 16.0935 51.3005 16.0563 50.5535 16.0804C50.3421 16.0858 50.1358 16.0881 49.9306 16.0905C49.3983 16.0966 48.8731 16.1026 48.2822 16.1601C47.4495 16.2508 46.6158 16.3596 45.7841 16.4856C42.6247 17.0904 39.7405 18.0653 37.2979 19.3053C36.3453 19.7302 35.5084 20.2226 34.6629 20.72C34.349 20.9048 34.0338 21.0902 33.7111 21.2731C33.5087 21.4083 33.3049 21.5431 33.1009 21.6781C32.2034 22.2718 31.2997 22.8697 30.471 23.5251C29.4437 24.3224 28.4215 25.1339 27.4829 26.0251C26.507 26.8791 25.6088 27.8246 24.7147 28.7783C23.9832 29.5475 23.3051 30.3935 22.6277 31.2385C22.4724 31.4322 22.3171 31.626 22.1612 31.8187L20.9808 33.4881L20.4001 34.3329L19.8558 35.2442L18.7911 37.0879L17.8315 39.11L17.3718 40.1373L16.9646 41.2593C16.9051 41.4334 16.845 41.6056 16.7851 41.7774C16.5831 42.3566 16.383 42.9303 16.2134 43.5507C15.914 44.6293 16.1045 45.6827 16.6711 46.5759C17.2456 47.4872 18.2638 48.3219 19.4826 48.8915C20.1359 49.2049 20.8597 49.4529 21.6278 49.6525C21.5837 50.0322 21.5466 50.4128 21.5095 50.7939C21.4874 51.0218 21.4651 51.25 21.4414 51.4783C21.4365 51.7066 21.43 51.9355 21.4236 52.1647C21.3968 53.1155 21.3698 54.0716 21.4535 55.0147C21.5684 57.3716 21.9949 59.6993 22.6683 61.9604C23.3135 64.2336 24.2742 66.4221 25.4578 68.5099C26.6201 70.6118 28.12 72.5604 29.8218 74.3538C33.2654 77.9708 37.7817 80.6008 42.4894 82.0122C44.8532 82.739 47.2847 83.1251 49.7324 83.3136C52.182 83.4708 54.6457 83.3296 57.0964 82.9688C59.542 82.5605 61.9633 81.8841 64.3233 80.9395C66.665 79.9406 68.9424 78.6894 71.0563 77.1168C73.13 75.522 75.0384 73.7135 76.6543 71.6983C78.2481 69.6762 79.6625 67.5137 80.7552 65.2113C82.9629 60.6176 84.1948 55.5798 84.2593 50.372ZM64.1699 50.8158C64.4159 53.0043 64.1264 55.3801 63.3754 57.5566C63.0124 58.6575 62.478 59.6635 61.9064 60.6312C61.3136 61.5867 60.5969 62.4114 59.8358 63.1866C59.0545 63.9216 58.1412 64.5718 57.1442 65.1605C56.1159 65.7009 55.006 66.1626 53.8286 66.5064C52.6431 66.8048 51.4123 67.0296 50.1623 67.0881C48.9202 67.1163 47.6581 67.078 46.4474 66.8411C44.011 66.3794 41.7962 65.4147 39.9363 63.8593C38.0522 62.3028 36.4432 60.1192 35.4281 57.6393C34.908 56.4055 34.5138 55.099 34.3142 53.7713C34.2176 53.3324 34.1822 52.8935 34.1466 52.4527C34.1283 52.2261 34.11 51.9991 34.0833 51.7712C34.089 51.5658 34.0897 51.3587 34.0905 51.1513C34.0917 50.8022 34.093 50.4519 34.1176 50.1059C35.5733 50.0294 36.9343 49.9588 38.0986 49.9497C39.0479 49.9287 39.8412 49.9641 40.4836 49.9927C40.7047 50.0025 40.908 50.0116 41.0936 50.0173C41.1798 50.0181 41.2612 50.0191 41.3377 50.02C41.9173 50.0269 42.2145 50.0305 42.1522 49.9397C42.1825 49.1171 42.875 47.1372 44.1865 45.4144C45.4487 43.6804 47.1695 41.9565 48.7199 40.9888C49.2796 40.5781 49.7736 40.3465 50.1667 40.1621C50.3245 40.0882 50.466 40.0218 50.589 39.9545C50.6707 39.9344 50.7493 39.8971 50.829 39.8407C50.8834 39.8123 50.9823 39.7999 51.087 39.7868C51.1684 39.7766 51.2534 39.7659 51.3239 39.747C51.5003 39.6956 51.6888 39.6845 51.8804 39.6805C51.9583 39.681 52.0356 39.6704 52.1135 39.6597C52.227 39.6441 52.3419 39.6283 52.462 39.6463C54.0448 39.6331 55.9391 40.1019 57.69 41.0918C59.445 42.0595 61.0459 43.5021 62.1346 45.1221C62.7122 45.9206 63.1184 46.7643 63.4692 47.727C63.8422 48.6695 64.0428 49.7271 64.1699 50.8158Z" fill="url(#paint0_linear_109_18525)"/>
                        <defs>
                        <linearGradient id="paint0_linear_109_18525" x1="6.5" y1="38" x2="96" y2="43" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#2D388A"/>
                        <stop offset="1" stop-color="#00AEEF"/>
                        </linearGradient>
                        </defs>
                    </svg>
                </div>

                <div class="flex justify-center mt-16">
                    <h1 class="text-4xl mx-auto font-extrabold tracking-tight leading-none text-center md:text-5xl lg:text-6xl dark:text-white" style="font-family: 'Mona Sans'">
                        Open CMAP-Tools for assignment<br>build with <span class="text-red-600">Laravel</span> and <span class="text-blue-600">GoJS</span>
                    </h1>
                </div>

                <div class="mt-16">
                    <video class="mx-auto lg:rounded-3xl border-0 drop-shadow-lg sm:rounded-none md:rounded-2xl" src="{{ asset('assets/video/concept.mp4') }}" autoplay="autoplay" loop="true"></video>
                </div>

                <div class="mt-16">
                    <h1 class="mb-4 text-4xl font-extrabold text-transparent md:text-5xl lg:text-6xl bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600" style="font-family: 'Mona Sans'">
                        How to use Open-CMAP ?
                    </h1>
                    <div class="mt-8 row" style="font-family: 'Mona Sans'">
                        <div class="col-sm-12 col-md-12 col-lg-4 block">
                            <h2 class="font-bold text-lg text-black mb-3 dark:text-white">
                                Build a Map
                            </h2>
                            <p class="text-gray-500">
                                The Left panel lists each Learner along with their score (if scored) and duration of the assessment. Select a Learner to view their individual map and results. <br>
                                <strong class="font-semibold text-gray-900 dark:text-white">Compare propositions</strong>, the default view in the map area, is a representation of all Learners’ maps combined. This view represents the knowledge framework of the entire group of Learners. You can use it to view information about Learner performance (if scored) and how frequently each proposition was made among Learners.  <br> <br>
                                {{-- Results
                                Correct: the proposition matches the Assessor’s map.
                                Incorrect: the proposition uses the wrong linking phrase to connect concepts
                                Missing: a correct proposition was not formed Extra: a proposition connects two concepts that should not be connected Compare Learners displays each Learner as a dot in a scatterplot diagram. The closer a dot is to the center, the higher the Learner scored (if scored). The closer a pair of dots is to each other, the more similarly that pair of Learners performed. Select one or more Learners to view or compare their results. --}}
                            </p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 block mb-3">
                            <h2 class="font-bold text-lg text-black mb-3 dark:text-white">
                                Reviewing a Map
                            </h2>
                            <p class="text-gray-500">
                                In Review, the map area shows how Learners performed at both the individual and the group level. This includes scores and performance on each component of a Build-a-Map or Skeleton Map assessment.
                            </p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 block">
                            <h2 class="font-bold text-lg text-black mb-3 dark:text-white">
                                Reverse Concept
                            </h2>
                            <p class="text-gray-500">
                                With Reverse Concept Mapping Retrieval, you no longer need to navigate through complex webs of information or search through countless notes and diagrams. Our innovative feature empowers users to effortlessly retrieve their previously created concept maps, allowing for quick and intuitive access to your wealth of knowledge.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-16">
                    <h1 class="font-extrabold text-4xl text-center mx-auto text-transparent md:text-5xl lg:text-6xl bg-clip-text bg-gradient-to-r from-purple-400 to-blue-600" style="font-family: 'Mona Sans'">
                        Why use Open-CMAP
                    </h1>

                    <div id="scrolling-container" class="flex items-center mt-8 bg-black rounded-3xl shadow-lg" style="height: 800px;">
                        <div class="w-full text-white overflow-hidden flex flex-col items-center relative" style="overscroll-behavior-y: auto; height: 150px">
                            <div id="scroller" class="w-full block text-center" style="overflow-y: scroll; scrollbar-width: 0; scrollbar-color: transparent transparent;">
                                <h1 class="font-extrabold text-9xl mb-4 mx-auto">
                                    Fast
                                </h1>
                                <h1 class="font-extrabold text-9xl mb-4 mx-auto">
                                    Lightweight
                                </h1>
                                <h1 class="font-extrabold text-9xl mb-4 mx-auto">
                                    Easy to Use
                                </h1>
                                <h1 class="font-extrabold text-9xl mb-4 mx-auto">
                                    Absolutely Free!
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-16">
                    <h1 class="font-extrabold text-4xl text-right mx-auto text-transparent md:text-5xl lg:text-6xl bg-clip-text bg-gradient-to-r from-purple-400 to-blue-600" style="font-family: 'Mona Sans'">
                        Road Map our Research
                    </h1>

                    <div class="mt-6">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg 6 mb-3 flex items-center h-96 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]"">
                                <img class="w-5/6 rouned-lg drop-shadow-lg" src="{{ asset('assets/image/roadmap.jpg') }}" alt="">
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg 6 ">
                                <ol class="relative border-r pr-6 border-gray-200 text-right dark:border-gray-700">                  
                                    <li class="mb-10 ml-4">
                                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -right-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">February 2023</time>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Application UI code in Tailwind CSS</h3>
                                        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Get access to over 3+ pages including a dashboard layout, projects, concept map board, user setting, and assign concept</p>
                                        <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">Learn more <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></a>
                                    </li>
                                    <li class="mb-10 ml-4">
                                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -right-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">March 2023</time>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add Assasment Feature</h3>
                                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">I research how to implements assasment method on concept map project. but for now this feature is still pending for develop, because of focus development program change to "Develop Concept Map apps With Reverse Concept Feature".</p>
                                    </li>
                                    <li class="mb-10 ml-4">
                                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -right-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">April 2023</time>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Change design behavior on Dashboard</h3>
                                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Get started with new page, where user can easily manage their concept map and assasment.</p>
                                    </li>
                                    <li class="mb-10 ml-4">
                                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -right-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">May 2023</time>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Reverse Concept Map</h3>
                                        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">User or especially Teacher can tracking user-behavior when create their own concept map.</p>
                                        <a href="{{ url('/release-notes') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">Learn more <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="dark:bg-gray-900 mt-16">
                    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative">
                        <a href="{{ url('/release-notes') }}" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-blue-700 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
                            <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 mr-3">New</span> <span class="text-sm font-medium">Reverse concept map was launched! See what's new</span>
                            <svg aria-hidden="true" class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        </a>
                        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white" style="font-family: 'Mona Sans'">We invest through innovative educational solutions.</h1>
                        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Here Open-CMAP we focus on Unlock the power of knowledge with Open Concept Mapping, a groundbreaking product designed to enhance education and assessments. Open Concept Mapping combines the simplicity of visual learning with the versatility of digital tools, empowering educators and learners to explore, connect, and evaluate ideas like never before. Keep an update!</p>
                        <form class="w-full max-w-md mx-auto">   
                            <label for="default-email" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Email sign-up</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </div>
                                <input type="email" id="default-email" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your email here..." required>
                                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign up</button>
                            </div>
                        </form>
                    </div>
                </section>

                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                        <div class="flex items-center gap-4">
                            <a href="https://paypal.me/WebDevID?country.x=ID&locale.x=en_US" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-center sm:ml-0">
                        <p class="text-slate-500">Copyright &copy; {{ date('Y') }} Zaka M. Noor All right reserved</p>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>

        <script>
            const scrollingEl = document.querySelector('#scrolling-container')
            const scroller = document.querySelector('#scroller')
            let isMouseInside = false;

            scrollingEl.addEventListener('mouseenter', function() {
                isMouseInside = true;
                // show log
                // console.log('Mouse entered the object');
            });

            scrollingEl.addEventListener('mouseleave', function() {
                isMouseInside = false;
                // show log
                // console.log('Mouse leave the object');
            });

            // Event handler for scroll
            window.addEventListener('wheel', (event) => {
                if (isMouseInside) {
                    // console.log('Mouse entered the object and user started scrolling.' + scrollingEl.scrollTop);

                    // Do something when mouse entered the object and user started scrolling

                    scroller.scrollIntoView({
                        behavior: 'smooth'
                    })
                }
            });
        </script>
    </body>
</html>
