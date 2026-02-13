<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.portfolio', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $path = $request->file('image')->store('portfolio', 'public');

        Project::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'image_path' => $path
        ]);

        return back()->with('success', 'ເພີ່ມຜົນງານໃໝ່ສຳເລັດ!');
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($project->image_path);
            $project->image_path = $request->file('image')->store('portfolio', 'public');
        }

        $project->update($request->only('title', 'category', 'description'));
        $project->save();

        return back()->with('success', 'ອັບເດດຜົນງານສຳເລັດ!');
    }

    public function destroy(Project $project)
    {
        Storage::disk('public')->delete($project->image_path);
        $project->delete();
        return back()->with('success', 'ລຶບຜົນງານແລ້ວ!');
    }
}
