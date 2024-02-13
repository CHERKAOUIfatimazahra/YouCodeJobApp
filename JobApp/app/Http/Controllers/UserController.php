<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        
        return view('users.index',compact('users'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();
        $roles = Role::all();
        return view('users.create',compact('skills','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|min:10|max:255',
        'email' => 'required|email',
        'password' => 'required',
        'roles' => 'required|array'
    ]);

    $roles = Role::all();
    $user = User::create($request->all());
   
    if ($user) {
        if ($request->has('skills')) {
            $user->skills()->sync($request->input('skills'));
        }   
    }
    if ($user) {
        if ($request->has('roles')) {
            $user->roles()->sync($request->input('roles'));
        }   
    }

    return redirect()->route('users.index')
                    ->with('success', 'User created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
            $roles = Role::all();
            return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'required|array',
        ]);
        $user = User::findorfail($request->user_id);
        $user->syncRoles($request->roles);
    
 
        return redirect()->route('users.index')
                        ->with('success','users updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
         
        return redirect()->route('users.index')
                        ->with('success','users deleted successfully');
    }
}
