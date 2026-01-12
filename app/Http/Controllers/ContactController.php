<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // 1. SIMPAN PESAN (Untuk Pengunjung / Frontend)
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Simpan ke database
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Kembali ke halaman kontak dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim! Terima kasih.');
    }

    // 2. LIHAT PESAN (Untuk Admin)
    public function index()
    {
        // Ambil pesan dari yang terbaru
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    // 3. HAPUS PESAN (Untuk Admin)
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contacts')->with('success', 'Pesan berhasil dihapus.');
    }
}