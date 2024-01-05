@extends('layout.layout')

@section('title')
    Parsing 0100
@endsection

@section('content')
    <div
        class="sm:items-center min-h-screen flex justify-center bg-dots-darker dark:bg-dots-lighter selection:bg-red-500 selection:text-white">

        <div class="p-4  w-max bg-whtie rounded-lg">
            <div class="  flex items-center justify-start" id="backButton">
                <a href="{{ route('menu-text') }}" 
                class="text-white uppercase bg-yellow-600 rounded-full aspect p-2 flex items-center gap-2"><i
                    class="lni lni-arrow-left"></i> kembali</a>
            </div>
            
            <div class="flex items-center flex-col py-5 text-3xl dark:text-gray-100 text-gray-900">
                <p class>Parser</p>
                <p> 0100</p>
            </div>
            @if (Session::has('message'))
                <p class="text-center font-semibold text-3xl text-red-400 my-3">{{ Session::get('message') }} </p>
            @endif

            <div class="relative w-[345px] sm:w-[500px]">
                <div class="w-full mx-auto">
                    {{-- upload --}}
                    <div id="fileUpload">
                        <form enctype="multipart/form-data" action="{{ route('post.0100') }}"
                            class="dropzone border-4 border-dotted border-yellow-600  rounded-lg flex flex-col bg-gray-300 dark:bg-gray-100 "
                            id="formUpload">
                            @csrf

                            <div class="absolute -bottom-14 w-full left-0">
                                <button id="submitForm" type="submit"
                                    class="bg-yellow-600 w-full rounded-xl p-2 text-white"> <i
                                        class="lni lni-printer"></i>Parsing 0100 Data</button>
                            </div>
                        </form>

                        <div class="my-2 font-bold ">
                            <button class="bg-rose-600 p-2 text-white rounded-lg w-full hidden" id="clearFile"
                                onclick="clearFile()">Bersihkan Semua File</button>
                        </div>

                        <div class="table table-striped w-full" class="files" id="previews">
                            <div id="template"
                                class="file-row justify-between flex my-1 border p-1 bg-yellow-200 dark:bg-yellow-100 rounded-lg">
                                <!-- This is used as the file preview template -->
                                <div class="">
                                    <div class="mr-1">
                                        <p class="name font-bold" data-dz-name></p>
                                        <strong class="error text-red-500 text-sm" data-dz-errormessage></strong>
                                        <p class="size" data-dz-size></p>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <button data-dz-remove class="bg-red-700 text-white rounded-lg p-2 delete">
                                        <i class="lni lni-trash-can"></i>
                                        <span>Hapus</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- download button --}}
                    <div class="-bottom-14 w-full left-0">
                        <form action="{{ route('downloadFile0100') }}" method="POST" id="downloadFile" class="hidden">
                            @csrf
                            <input type="hidden" name="fileName" id="fileName" value="">
                            <button class="bg-yellow-300 uppercase w-full rounded-xl p-2 text-black" id="downloadButton"
                                type="submit">Download</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
<x-jsCode />
@endpush