<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $announcements = Announcement::latest()->paginate(4);
        
        return view('home',compact('announcements'))
                    ->with('i', (request()->input('page', 1) - 1) * 4);
    }
    public function announce(){
        $announcements = Announcement::latest()->paginate(10);
        
        return view('homeAnnoune',compact('announcements'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
    }
   
    public function company(){
        $companies = Company::latest()->paginate(10);
        
        return view(' homeCompany',compact('companies'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
}
