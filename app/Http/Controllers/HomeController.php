<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        

        // Get the current authenticated user
        $user = Auth::user(); 
        $groupselected = $user->groups;
        
        // Filter dashboards based on the groups the user belongs to
        $dashboards = Dashboard::whereHas('groups', function($query) use ($groupselected) {
            $query->whereIn('groups.id', $groupselected->pluck('id'));
        })->get();


        return view('dashboard', compact('dashboards'));
        
    }
    public function show($id)
    {
        $user = Auth::user(); 
        $groupselected = $user->groups;
        $dashboard = Dashboard::find($id);

        // Check if the dashboard's groups match the user's groups
        if ($dashboard->groups->intersect($groupselected)->isNotEmpty()) {
            return view('dashboard-show', compact('dashboard'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}
