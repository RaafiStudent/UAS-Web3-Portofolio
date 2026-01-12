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
        // Validasi
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            'link' => 'nullable|url',
            'date' => 'nullable|string', // Kolom Baru
            'technologies' => 'nullable|string', // Kolom Baru
        ]);

        // Upload Gambar
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        // Simpan ke Database
        Project::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => $imagePath,
            'description' => $request->description,
            'link' => $request->link,
            'date' => $request->date, // Simpan Tanggal
            'technologies' => $request->technologies, // Simpan Teknologi
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
            'date' => 'nullable|string',
            'technologies' => 'nullable|string',
        ]);

        // Cek jika ada gambar baru
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $project->image = $request->file('image')->store('projects', 'public');
        }

        // Update Data Lainnya
        $project->title = $request->title;
        $project->slug = Str::slug($request->title);
        $project->description = $request->description;
        $project->link = $request->link;
        $project->date = $request->date; // Update Tanggal
        $project->technologies = $request->technologies; // Update Teknologi
        
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