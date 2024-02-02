@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="w-full max-w-md">
            <div class="mb-8 flex justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Add New Company</h2>
                </div>
                <div class="mb-8 flex justify-end">
                    <a href="{{ route('companies.index') }}"
                        class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md m-2 p-2 transition duration-300">Back</a>
                </div>
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

            <form action="{{ route('companies.store') }}" method="POST">
                @csrf

                <div class="grid gap-4">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name:</label>
                        <input type="text" name="name" id="name" class="form-input" placeholder="Name"
                            required="">
                    </div>

                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description:</label>
                        <input type="text" name="description" id="description" class="form-input"
                            placeholder="Description" required="">
                    </div>

                    <div class="text-center">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-300">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('title', 'YJD Create Company')
