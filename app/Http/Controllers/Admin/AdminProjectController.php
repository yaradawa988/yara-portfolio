<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
class AdminProjectController extends Controller
{
     public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

 public function create() {
    return view('admin.projects.create');
}


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:255',
            'tech_stack' => 'nullable|array',
            'cover_image' => 'nullable|image|max:2048',
            'live_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'role' => 'nullable|string|max:255',
            'featured' => 'boolean',
            'started_at' => 'nullable|date',
            'ended_at' => 'nullable|date',
        ]);

        $data['slug'] = Str::slug($data['title']);

        if($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:255',
            'tech_stack' => 'nullable|array',
            'cover_image' => 'nullable|image',
            'live_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'role' => 'nullable|string|max:255',
            'featured' => 'boolean',
            'started_at' => 'nullable|date',
            'ended_at' => 'nullable|date',
        ]);

        $data['slug'] = Str::slug($data['title']);

        if($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return back()->with('success', 'Project deleted successfully.');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

}
