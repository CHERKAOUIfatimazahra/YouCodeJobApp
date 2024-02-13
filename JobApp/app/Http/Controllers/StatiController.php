<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Apply;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class StatiController extends Controller
{
    public function index()
    {
        $users_count = User::count();
        $announcements_count = Announcement::count();
        $companies_count = Company::count();
        $applies_count = Apply::count();

        return view('statistic.index', compact('users_count','announcements_count', 'companies_count','applies_count'));
    }
}
