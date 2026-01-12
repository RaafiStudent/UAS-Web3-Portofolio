<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048', // Validasi Gambar
        ]);

        $imagePath = $request->file('image')->store('skills', 'public');

        Skill::create([
            'name' => $request->name,
            'color' => $request->color,
            'image' => $imagePath,
        ]);

        return redirect()->route('skills.index')->with('success', 'Skill berhasil ditambahkan!');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($skill->image) {
                Storage::disk('public')->delete($skill->image);
            }
            $skill->image = $request->file('image')->store('skills', 'public');
            $skill->save();
        }

        $skill->update([
            'name' => $request->name,
            'color' => $request->color,
        ]);

        return redirect()->route('skills.index')->with('success', 'Skill berhasil diperbarui!');
    }

    public function destroy(Skill $skill)
    {
        if ($skill->image) {
            Storage::disk('public')->delete($skill->image);
        }
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'Skill berhasil dihapus!');
    }
}