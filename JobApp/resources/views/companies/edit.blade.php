@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="w-full max-w-md">
            <div class="mb-8 flex justify-end">
                <a href="{{ route('companies.index') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-300">Back</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('companies.update', $company->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="text-gray-700 text-xl font-semibold">Name:</label>
                    <input type="text" name="name" id="name" value="{{ $company->name }}"
                        class="form-input mt-1 block w-full rounded-md shadow-sm">
                </div>

                <div class="mb-4">
                    <label for="description" class="text-gray-700 text-xl font-semibold">Description:</label>
                    <input type="text" name="description" id="description" value="{{ $company->description }}"
                        class="form-input mt-1 block w-full rounded-md shadow-sm">
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-300">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
