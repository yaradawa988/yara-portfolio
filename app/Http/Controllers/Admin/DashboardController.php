<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
class DashboardController extends Controller
{
  public function index()
{
    $projectCount = Project::count();
    $featuredCount = Project::where('featured', true)->count();

    
    $userCount = User::count();

    
    $techLabels = ['Laravel','Tailwind','Bootstrap','Vue.js','React','MySQL','API'];
    $techCounts = [];

    foreach($techLabels as $tech) {
        $techCounts[] = Project::whereJsonContains('tech_stack', $tech)->count();
    }

    return view('admin.dashboard', compact('projectCount','featuredCount','userCount','techLabels','techCounts'));
}

}
