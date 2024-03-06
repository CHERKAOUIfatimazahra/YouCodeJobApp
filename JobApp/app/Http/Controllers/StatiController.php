<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Apply;
use App\Models\Company;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatiController extends Controller
{
    public function index()
    {
        $users_count = User::count();
        $announcements_count = Announcement::count();
        $companies_count = Company::count();
        $applies_count = Apply::count();
        
        $pop_skill = DB::table('announcement_skill')
        ->select('skill_id',DB::raw('count(*) as skill_count'))
        ->leftJoin('skill','skill.id', '=', 'skill_id')
        ->groupBy('skill_id')
        ->orderByDesc('skill_count')
        ->get();

        $popular_skill = Skill::find($pop_skill->first()->skill_id);


        return view('statistic.index', compact('users_count','announcements_count', 'companies_count','applies_count','popular_skill'));
    }

}

//skills afficher 
//announce::all() v
//skills_announce() v
//skills match entre les announces