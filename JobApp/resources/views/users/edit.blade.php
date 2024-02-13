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
                <div class="mb-6">
                    <div class="text-xl font-semibold mb-2 text-gray-700">UserName:</div>
                    <div class="bg-gray-100 p-6 rounded-md shadow-md">
                        {{ $user->name }}
                    </div>
                </div>
                <div class="mb-6">
                    <div class="text-xl font-semibold mb-2 text-gray-700">User Email:</div>
                    <div class="bg-gray-100 p-6 rounded-md shadow-md">
                        {{ $user->email }}
                    </div>
                </div>
                {{-- multiselect --}}
                <div class="mb-6">
                    <div class="text-xl font-semibold mb-2 text-gray-700">User Skills:</div>
                    <div class="bg-gray-100 p-6 rounded-md shadow-md">
                        {{ $user->skill }}
                    </div>
                </div>
                <form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden"  name="user_id" value="{{$user->id}}" >
    <div class="mb-6">
        <label for="name" class="text-xl font-semibold mb-2 text-gray-700">User Roles</label>
        <select id="name" class="form-multiselect block w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" multiple="multiple" name="roles[]">
            @foreach($roles as $role)
                <option  value="{{$role->name }}" selected >{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>

        </div>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#name').select2();
        });
    </script>
@endsection

@section('title', 'YJD edit profile')
