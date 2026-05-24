<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category'    => 'required|in:web,mobile,api',
            'tech_stack'  => 'required|string',
            'demo_url'    => 'nullable|url',
            'github_url'  => 'nullable|url',
            'thumbnail'   => 'nullable|image|max:2048',
            'is_featured' => 'nullable|boolean',
            'order'       => 'nullable|integer',
        ]);

        $data['slug']       = Str::slug($data['title']);
        $data['tech_stack'] = array_map('trim', explode(',', $data['tech_stack']));
        $data['is_featured']= $request->boolean('is_featured');

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('projects', 'public');
        }

        Project::create($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category'    => 'required|in:web,mobile,api',
            'tech_stack'  => 'required|string',
            'demo_url'    => 'nullable|url',
            'github_url'  => 'nullable|url',
            'thumbnail'   => 'nullable|image|max:2048',
            'is_featured' => 'nullable|boolean',
            'order'       => 'nullable|integer',
        ]);

        $data['tech_stack'] = array_map('trim', explode(',', $data['tech_stack']));
        $data['is_featured']= $request->boolean('is_featured');

        if ($request->hasFile('thumbnail')) {
            if ($project->thumbnail) Storage::disk('public')->delete($project->thumbnail);
            $data['thumbnail'] = $request->file('thumbnail')->store('projects', 'public');
        }

        $project->update($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diupdate!');
    }

    public function destroy(Project $project)
    {
        if ($project->thumbnail) Storage::disk('public')->delete($project->thumbnail);
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project dihapus.');
    }
}