<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    // 1. DAFTAR SERTIFIKAT
    public function index()
    {
        $certificates = Certificate::all();
        return view('admin.certificates.index', compact('certificates'));
    }

    // 2. FORM TAMBAH
    public function create()
    {
        return view('admin.certificates.create');
    }

    // 3. SIMPAN DATA (Sesuai Gambar Boss)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255', // Penyelenggara
            'issued_at' => 'required|string|max:255', // Tanggal
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('certificates', 'public');

        Certificate::create([
            'title' => $request->title,
            'issuer' => $request->issuer,
            'issued_at' => $request->issued_at,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('certificates.index')->with('success', 'Sertifikat berhasil ditambahkan!');
    }

    // 4. FORM EDIT
    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    // 5. UPDATE DATA
    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'issued_at' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($certificate->image) {
                Storage::disk('public')->delete($certificate->image);
            }
            $certificate->image = $request->file('image')->store('certificates', 'public');
        } else {
            // Kalau tidak upload gambar baru, tetap pakai data lama (JANGAN DIHAPUS)
            // Tidak perlu $certificate->image = ... karena otomatis tetap
        }

        // Kita update field lainnya secara manual biar aman
        $certificate->title = $request->title;
        $certificate->issuer = $request->issuer;
        $certificate->issued_at = $request->issued_at;
        $certificate->description = $request->description;
        // Simpan perubahan (termasuk jika image berubah)
        $certificate->save();

        return redirect()->route('certificates.index')->with('success', 'Sertifikat berhasil diperbarui!');
    }

    // 6. HAPUS DATA
    public function destroy(Certificate $certificate)
    {
        if ($certificate->image) {
            Storage::disk('public')->delete($certificate->image);
        }
        $certificate->delete();
        return redirect()->route('certificates.index')->with('success', 'Sertifikat berhasil dihapus!');
    }
}