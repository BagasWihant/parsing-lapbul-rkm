@extends('layout.layout')

@section('title') Menu Text Parser @endsection


@section('content')
<div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="  flex items-center justify-start" id="backButton">
                <a href="{{ route('welcome') }}" class="text-white uppercase bg-yellow-600 rounded-full aspect p-2 flex "><i
                        class="lni lni-arrow-left"></i></a>
            </div>
            
            <div class="flex justify-center">
                <img src="{{asset('assets/logo-biru.png')}}" class="max-h-20 sm:max-h-28 aspect-auto">
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                    <a href="{{ route('parse-0100') }}"
                        class="scale-100 p-6 bg-yellow-600/35 dark:bg-yellow-800/40 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <div class="flex justify-center">
                                <i class="lni lni-empty-file bg-yellow-800 bg-blend-overlay rounded-full aspect-square p-3 items-center justify-center flex text-white text-3xl"></i>
                            </div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Parsing 0100</h2>

                        </div>

                    </a>

                    <a href="{{ route('parse-0200') }}"
                        class="scale-100 p-6 bg-green-600/35 dark:bg-green-800/40 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <div class="flex justify-center">
                                <i class="lni lni-empty-file bg-green-800 bg-blend-overlay rounded-full aspect-square p-3 items-center justify-center flex text-white text-3xl"></i>
                            </div>
                            
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Parsing 0200 </h2>

                        </div>

                    </a>

                    <a href="{{ route('parse-0101') }}"
                        class="scale-100 p-6 bg-blue-600/35 dark:bg-blue-800/40 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <div class="flex justify-center">
                                <i class="lni lni-empty-file bg-blue-800 bg-blend-overlay rounded-full aspect-square p-3 items-center justify-center flex text-white text-3xl"></i>
                            </div>
                            
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Parsing 0101 </h2>

                        </div>

                    </a>
                    <a href="{{ route('parse-lainnya') }}"
                        class="scale-100 p-6 bg-orange-600/35 dark:bg-orange-800/40 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <div class="flex justify-center">
                                <i class="lni lni-empty-file bg-orange-800 bg-blend-overlay rounded-full aspect-square p-3 items-center justify-center flex text-white text-3xl"></i>
                            </div>
                            
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Parsing Lainnya</h2>

                        </div>

                    </a>

                </div>
            </div>

            <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                    <div class="flex items-center gap-4">
                        <a href="https://github.com/sponsors/taylorotwell"
                            class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5"
                                class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            Sponsor
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>
@endsection