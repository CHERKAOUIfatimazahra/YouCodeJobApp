@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="mb-8 flex justify-end">
            <a href="{{ route('companies.index') }}"
                class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md m-2 p-2 transition duration-300">Back</a>
        </div>
        <div class="w-full max-w-lg">
            <div class="text-3xl font-bold text-gray-800 mb-8 text-center">
                Show Company
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <div class="text-xl font-semibold mb-2 text-gray-700">Name:</div>
                    <div class="bg-gray-100 p-6 rounded-md shadow-md">
                        {{ $company->name }}
                    </div>
                </div>

                <div>
                    <div class="text-xl font-semibold mb-2 text-gray-700">Description:</div>
                    <div class="bg-gray-100 p-6 rounded-md shadow-md">
                        {{ $company->description }}
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <a href="{{ route('companies.index') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-300">Back</a>
            </div>
        </div>
    </div>
@endsection
