<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnouncementRequest;
use App\Models\Announcement;
use App\Models\Company;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use App\Http\Requests\StoreAnnouncementRequest;
// use App\Http\Requests\UpdateAnnouncementRequest;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $announcements = Announcement::with('skills')->get();
        $announcements = Announcement::latest()->paginate(5);
        return view('announcements.index',compact('announcements'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $companies = Company::all();
    $skills = Skill::all();

    return view('Announcements.create', compact('companies','skills'));
}
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnouncementRequest $request)
    {
        // $request->validate([
        //     'title'=>'required|min:10|max:255',
        //     'description'=>'required',
        //     'date'=>'required|date',
        //     'user_id'=>'exists:users,id',
        //     'company_id'=> 'exists:companies,id'
            
        // ]);
        // dd($request->all());
        
        $announcement = Announcement::create($request->validated());
        if ($announcement) {
            if ($request->has('skills')) {
                $announcement->skills()->sync($request->input('skills'));
            }   
        }
         
        return redirect()->route('announcements.index')
                        ->with('success','Announcement created successfully.');
                        
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        $announcement->load('company');
        return view('announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Announcement $Announcement)
    // {
    //     $companies = Company::all();
    //     return view('announcements.edit', compact('companies'));
    // }
    public function edit(Announcement $announcement)
    {
        $companies = Company::all();
        $skills = Skill::all();
        return view('announcements.edit', compact('announcement', 'companies','skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAnnouncementRequest $request, Announcement $announcement)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'nullable',
        //     'date' => 'required|date',
        //     'company_id' => 'required|exists:companies,id',

        // ]);

        $announcement->update($request->validated()
            // [
            // 'title' => $request->title,
            // 'description' => $request->description,
            // 'date' => $request->date,
            // 'company_id' => $request->company_id,]
    );

        return redirect()->route('announcements.index')->with('success', 'Announcement updated successfully');
    }
    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Announcement $Announcement)
    // {
    //     $request->validate([
    //         'name'=>'required|min:10|max:255',
    //         'description'=>'required', 
    //     ]);
    //     $Announcement->update($request->all());
        
    //     return redirect()->route('announcements.index')
    //                     ->with('success','Announcement updated successfully');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $Announcement)
    {
        $Announcement->delete();
         
        return redirect()->route('announcements.index')
                        ->with('success','Announcement deleted successfully');
    }
}
