<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Apply;
use App\Http\Requests\StoreApplyRequest;
use App\Http\Requests\UpdateApplyRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        $applies = Apply::with('user', 'announcement')->latest()->paginate(5);
        return view('apply.index', compact('applies','user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

//     public function apply(Request $request, Announcement $announcement)
// {
//     Apply::create([
//         'user_id' => auth()->id(),
//         'announcement_id' => $announcement->id,
//     ]);

//     return redirect()->back();
// }
public function apply(Request $request, $user_id, $announcement_id)
{
    $apply = new Apply();
    $apply->user_id = $user_id; 
    $apply->announcement_id = $announcement_id;
    $apply->save();

    return redirect()->back()->with('success', 'Application submitted successfully.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apply $apply)
    {
        //
    }
}
