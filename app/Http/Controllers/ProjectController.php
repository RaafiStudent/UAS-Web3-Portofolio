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
        // LOGIKA UTAMA: Urutkan berdasarkan kolom 'date' dari TERBARU ke TERLAMA
        $projects = Project::orderBy('date', 'desc')->paginate(10);

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
            // Wajib diisi agar pengurutan tidak error
            'date' => 'required|date', 
            'technologies' => 'nullable|string',
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
            'date' => $request->date, // Data format YYYY-MM-DD masuk sini
            'technologies' => $request->technologies,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project berhasil ditambahkan!');
    }

    // 4. FORM EDIT (EDIT)
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    // 5. UPDATE DATA (UPDATE)
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            'link' => 'nullable|url',
            'date' => 'required|date', // Wajib date
            'technologies' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $project->image = $request->file('image')->store('projects', 'public');
        }

        $project->title = $request->title;
        $project->slug = Str::slug($request->title);
        $project->description = $request->description;
        $project->link = $request->link;
        $project->date = $request->date; 
        $project->technologies = $request->technologies;

        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project berhasil diperbarui!');
    }

    // 6. HAPUS DATA (DESTROY)
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project berhasil dihapus!');
    }
}