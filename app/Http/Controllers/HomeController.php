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
        $dashboard = Dashboard::find($id);
        return view('dashboard-show', compact('dashboard'));
    }
}
