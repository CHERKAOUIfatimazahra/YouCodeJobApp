<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {

        $announcements = Announcement::latest()->paginate(4);
        $user = Auth::user();
        $hasMatchingSkills = false;
    
        if ($user) {
            foreach ($announcements as $announcement) {
                $percentage = $this->match($user->id, $announcement->id);
                if ($percentage >= 50) { 
                    $hasMatchingSkills = true;
                    break;
                }
            }
        }
    
        return view('home', compact('announcements', 'hasMatchingSkills'))
            ->with('i', (request()->input('page', 1) - 1) * 4);
    }
    
    // public function index()
    // {
        // if (Auth::check()) {
        //     $user = Auth::user();

        //     if ($user->skills->isNotEmpty()) {

        //         $announcements = Announcement::whereHas('skills', function ($query) use ($user) {
        //             $query->whereIn('skill_id', $user->skills->pluck('id')->toArray());
        //         })->get();
                
        //         return view('home', compact('announcements'));
        //     } else {
        //         return view('home', ['announcements' => []]);
        //     }
        // } else {
        //     return redirect()->route('login');
        // }
    // }

    public function announce(){
        $announcements = Announcement::latest()->paginate(10);
        
        return view('homeAnnoune',compact('announcements'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    private function match($userId, $announcementId)
{
    $user = User::findOrFail($userId);
    $announcement = Announcement::findOrFail($announcementId);

    $userSkills = $user->skills->pluck('id')->toArray();
    $announcementSkills = $announcement->skills->pluck('id')->toArray();

    $matchedSkillsCount = count(array_intersect($userSkills, $announcementSkills));
    $announcementSkillsCount = count($announcementSkills);

    if ($announcementSkillsCount === 0) {
        return 0;
    }

    $percentage = ($matchedSkillsCount / $announcementSkillsCount) * 100;

    return $percentage;
}


    public function company(){
        $companies = Company::latest()->paginate(10);
        
        return view(' homeCompany',compact('companies'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
}
