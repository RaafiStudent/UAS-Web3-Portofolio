<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    // 1. INDEX (TAMPILKAN DATA)
    public function index()
    {
        // LOGIKA UTAMA: Urutkan berdasarkan tanggal sertifikat (Terbaru di atas)
        $certificates = Certificate::orderBy('date', 'desc')->paginate(10);

        return view('admin.certificates.index', compact('certificates'));
    }

    // 2. CREATE (FORM TAMBAH)
    public function create()
    {
        return view('admin.certificates.create');
    }

    // 3. STORE (SIMPAN DATA)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            // Wajib date agar bisa diurutkan
            'date' => 'required|date', 
            'issuer' => 'nullable|string', // Opsional: Penerbit sertifikat (jika ada)
            'link' => 'nullable|url',      // Opsional: Link kredensial (jika ada)
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('certificates', 'public');
        }

        Certificate::create([
            'title' => $request->title,
            'image' => $imagePath,
            'description' => $request->description,
            'date' => $request->date, // Simpan tanggal
            'issuer' => $request->issuer ?? null,
            'link' => $request->link ?? null,
        ]);

        return redirect()->route('certificates.index')->with('success', 'Sertifikat berhasil ditambahkan!');
    }

    // 4. EDIT (FORM EDIT)
    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    // 5. UPDATE (UPDATE DATA)
    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            'date' => 'required|date',
            'issuer' => 'nullable|string',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            if ($certificate->image) {
                Storage::disk('public')->delete($certificate->image);
            }
            $certificate->image = $request->file('image')->store('certificates', 'public');
        }

        $certificate->title = $request->title;
        $certificate->description = $request->description;
        $certificate->date = $request->date;
        $certificate->issuer = $request->issuer ?? $certificate->issuer;
        $certificate->link = $request->link ?? $certificate->link;

        $certificate->save();

        return redirect()->route('certificates.index')->with('success', 'Sertifikat berhasil diperbarui!');
    }

    // 6. DESTROY (HAPUS DATA)
    public function destroy(Certificate $certificate)
    {
        if ($certificate->image) {
            Storage::disk('public')->delete($certificate->image);
        }
        $certificate->delete();

        return redirect()->route('certificates.index')->with('success', 'Sertifikat berhasil dihapus!');
    }
}