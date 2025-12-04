<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
class ProjectController extends Controller
{
     
    public function index()
    {
        $projects = Project::orderBy('featured', 'desc')->latest()->paginate(6);
        return view('projects.index', compact('projects'));
    }

   
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('projects.show', compact('project'));
    }
}
