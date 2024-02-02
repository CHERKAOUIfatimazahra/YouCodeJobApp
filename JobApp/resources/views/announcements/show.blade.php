@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded m-7 p-7"
                    href="{{ route('announcements.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <div class="flex flex-col items-center justify-center text-center">

                <h3 class="text-2xl mb-2">{{ $announcement->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $announcement->company->name }}</div>


                {{-- <div class="text-lg mt-2">
                            <i class="fa-solid fa-location-dot"></i> {{$announcement->company->location}}
                        </div> --}}
                <div class="text-lg my-4">
                    <i class="fa-regular fa-clock"></i> {{ $announcement->date }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{ $announcement->description }}

                        {{-- <a
                                    href="mailto:{{$announcement->company->email}}"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                > --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('title', 'YJD announcements')
