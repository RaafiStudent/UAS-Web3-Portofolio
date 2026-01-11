<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Import Str untuk Slug
use Illuminate\Support\Facades\Storage; // Import Storage untuk Hapus Gambar

class ProjectController extends Controller
{
    // MENAMPILKAN DAFTAR PROJECT
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    // MENAMPILKAN FORM TAMBAH PROJECT
    public function create()
    {
        return view('admin.projects.create');
    }

    // MENYIMPAN DATA KE DATABASE
    public function store(Request $request)
    {
        // 1. Validasi Data
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maks 2MB
            'description' => 'required|string',
            'link' => 'nullable|url',
        ]);

        // 2. Upload Gambar
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        // 3. Simpan ke Database
        Project::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title), // Otomatis bikin slug dari judul
            'image' => $imagePath,
            'description' => $request->description,
            'link' => $request->link,
        ]);

        // 4. Kembali ke halaman index dengan pesan sukses
        return redirect()->route('projects.index')->with('success', 'Project berhasil ditambahkan!');
    }

    // ... (Fungsi Edit, Update, Destroy menyusul di part berikutnya biar ga pusing)
}