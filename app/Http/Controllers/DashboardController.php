<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Dashboard;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
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

    public function listByCompany($companyId)
    {
        $user = Auth::user();
        $groupselected = $user->groups;

        $company = Company::find($companyId);
        $dashboards = $company->dashboards()->whereHas('groups', function($query) use ($groupselected) {
            $query->whereIn('groups.id', $groupselected->pluck('id'));
        })->get();

        return view('dashboard', compact('dashboards'));
    }
}
