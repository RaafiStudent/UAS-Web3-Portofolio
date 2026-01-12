<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    // 1. DAFTAR SKILL
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills.index', compact('skills'));
    }

    // 2. FORM TAMBAH
    public function create()
    {
        return view('admin.skills.create');
    }

    // 3. SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:50', // Misal: 'blue', 'red', '#FF0000'
        ]);

        Skill::create($request->all());

        return redirect()->route('skills.index')->with('success', 'Skill berhasil ditambahkan!');
    }

    // 4. FORM EDIT
    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    // 5. UPDATE DATA
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:50',
        ]);

        $skill->update($request->all());

        return redirect()->route('skills.index')->with('success', 'Skill berhasil diperbarui!');
    }

    // 6. HAPUS DATA
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'Skill berhasil dihapus!');
    }
}