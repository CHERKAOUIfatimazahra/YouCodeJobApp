@extends('layouts.app')
@extends('layouts.sidbar')

@section('content')

    <!-- component -->
    <div class="p-4 sm:ml-64">
        <div class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
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
                <!-- Start coding here -->
                <form action="{{ route('profils.update', Auth::user()->id) }}" method="POST">
                    @csrf

                    @method('put')
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
                        <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ Auth::user()->name }}">
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required value="{{ Auth::user()->email }}">
                    </div>
                    {{-- multiselect --}}
                    <div class="mb-6">
                        <label for="skill" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Skills</label>
                        
                        <select id="skill" class="form-multiselect block w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" multiple="multiple" name="skills[]">
                            @php
                                $userSkills = $user->skills->pluck('id')->toArray();
                            @endphp
                        
                            @foreach($user->skills as $skill)
                                <option value="{{ $skill->id }}" selected>{{ $skill->skill }}</option>
                            @endforeach
                        
                            @foreach($skills as $skill)
                                @if (!in_array($skill->id, $userSkills))
                                    <option value="{{ $skill->id }}">{{ $skill->skill }}</option>
                                @endif
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="mb-6">
                        <label for="password" name="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                        <input data-popover-target="popover-password" data-popover-placement="bottom" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ Auth::user()->password }}">
                    </div>
                    {{-- <div class="mb-6">
                        <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New password</label>
                        <input data-popover-target="popover-password" data-popover-placement="bottom" type="password" id="new_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div> --}}
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() { 
            $('#skill').select2();
        });
    </script>
@endsection

@section('title', 'YJD edit profile')
