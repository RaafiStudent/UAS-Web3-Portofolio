<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // 1. TAMPILKAN DAFTAR (INDEX)
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    // 2. FORM TAMBAH (CREATE)
    public function create()
    {
        return view('admin.projects.create');
    }

    // 3. SIMPAN DATA BARU (STORE)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            'link' => 'nullable|url',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        Project::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => $imagePath,
            'description' => $request->description,
            'link' => $request->link,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project berhasil ditambahkan!');
    }

    // 4. FORM EDIT (EDIT) - FITUR BARU
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    // 5. UPDATE DATA (UPDATE) - FITUR BARU
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Image jadi nullable (opsional)
            'description' => 'required|string',
            'link' => 'nullable|url',
        ]);

        // Cek jika ada gambar baru diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama dulu
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            // Upload gambar baru
            $imagePath = $request->file('image')->store('projects', 'public');
            $project->image = $imagePath;
        }

        // Update data lainnya
        $project->title = $request->title;
        $project->slug = Str::slug($request->title);
        $project->description = $request->description;
        $project->link = $request->link;
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project berhasil diperbarui!');
    }

    // 6. HAPUS DATA (DESTROY) - FITUR BARU
    public function destroy(Project $project)
    {
        // Hapus file gambar dari penyimpanan
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        // Hapus data dari database
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project berhasil dihapus!');
    }
}