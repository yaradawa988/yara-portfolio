<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
class WelcomeController extends Controller
{
   
    public function index()
    {
        $featuredProjects = Project::where('featured', true)->limit(3)->get();
        return view('welcome', compact('featuredProjects'));
    }}