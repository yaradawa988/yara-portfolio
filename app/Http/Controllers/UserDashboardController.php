<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
class UserDashboardController extends Controller
{
    public function index()
{
    
    $projectCount = Project::count();
    $featuredCount = Project::where('featured', true)->count();

    return view('dashboard', compact('projectCount', 'featuredCount'));
}

}
