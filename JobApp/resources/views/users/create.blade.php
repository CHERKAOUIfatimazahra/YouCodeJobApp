@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="w-full max-w-md">
            <div class="mb-8 flex justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Add New User</h2>
                </div>
                <div class="mb-8 flex justify-end">
                    <a href="{{ route('users.index') }}"
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

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="grid gap-4">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name:</label>
                        <input type="text" name="name" id="name" class="form-input" placeholder="Name"
                            required="">
                    </div>

                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Email:</label>
                        <input type="text" name="email" id="email" class="form-input" placeholder="Description"
                            required="">
                    </div>

                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Email:</label>
                        <input type="text" name="email" id="email" class="form-input" placeholder="Description"
                            required="">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-semibold text-gray-600 mb-1">Password</label>
                        <input type="password"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-orange-500"
                            name="password" />
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="skill" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            Skills</label>
                        <select id="skill"
                            class="form-multiselect block w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            multiple="multiple" name="skills[]">
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->skill }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="role" class="text-xl font-semibold mb-2 text-gray-700">User Roles</label>
                        <select id="role"
                            class="form-multiselect block w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            multiple="multiple" name="role[]">
                            @foreach ($roles as $role)
                                <option>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-300">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#skill').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#role').select2();
        });
    </script>
@endsection

@section('title', 'YJD Create User')
