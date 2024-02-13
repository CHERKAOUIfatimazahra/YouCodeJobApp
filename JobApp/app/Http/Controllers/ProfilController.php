<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{ 
    $user = User::with('skills')->get();
    return view('profils.index', compact('user'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::with('skills')->findOrFail($id);
         
        $skills = Skill::get(); 
        return view('profils.edit', compact('user', 'skills'));
       
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {  
         
        $request->validate(
            [
            'name'=>'required|min:10|max:255',
            'email' => ['required', 'email'] 
            ]
    );

        $user->update($request->all());

        if ($request->has('skills')) {
            $user->skills()->sync($request->input('skills'));
        }   

        return redirect()->route('profils.index')
                        ->with('success','users updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
         
        return redirect()->route('profils.index')
                        ->with('success','users deleted successfully');
    }
    public function addSkill(Request $request, $userId)
    {
        $request->validate([
            'skill' => 'required|exists:skill,id'
        ]);

        $user = User::find($userId);
        $user->skills()->attach($request->input('skill'));

        return redirect()->route('profils.edit', $userId)
            ->with('success', 'Skill added successfully');
    }
}