<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $announcements = Announcement::latest()->paginate(5);
        
        return view('home',compact('announcements'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function announce(){
        $announcements = Announcement::latest()->paginate(10);
        
        return view('homeAnnoune',compact('announcements'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    // public function show(Announcement $announcement)
    // {
    //     $announcement->load('company');
    //     return view('/', compact('announcement'));
    // }
}
