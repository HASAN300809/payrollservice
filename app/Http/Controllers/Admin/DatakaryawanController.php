<?php

namespace App\Http\Controllers\Admin;

use App\Models\Datakaryawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DatakaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Datakaryawan::latest()->get();
        // mengirim data karayawan ke view
        return view('admin.datakaryawan', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:50',
            'email' => 'required|email',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'jabatan' => 'required|string|max:100',
            'tanggal_masuk' => 'required|date',
            'gaji_pokok' => 'required|numeric',
            'status' => 'in:aktif,tidak aktif',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'nik.required' => 'NIK wajib diisi.',
            'nik.max' => 'NIK tidak boleh lebih dari 50 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'no_hp.max' => 'No HP tidak boleh lebih dari 20 karakter.',
            'jabatan.max' => 'Jabatan tidak boleh lebih dari 100 karakter.',
            'jabatan.required' => 'jabatan wajib diisi.',
            'tanggal_masuk.date' => 'Tanggal masuk harus berupa tanggal yang valid.',
            'tanggal_masuk.required' => 'Tanggal Masuk wajib diisi.',
            'gaji_pokok.numeric' => 'Gaji pokok harus berupa angka.',
            'gaji_pokok.required' => 'Gaji pokok wajib diisi.',
            'status' => 'Status wajib dipilih.',
            'status.in' => 'Status harus antara Aktif atau Tidak Aktif.',
        ]);

        Datakaryawan::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,
            'tanggal_masuk' => $request->tanggal_masuk,
            'gaji_pokok' => $request->gaji_pokok,
            'status' => $request->status,
        ]);

        return redirect()->route('datakaryawan.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $karyawan = Datakaryawan::findOrFail($id);

        return view('admin.editdatakaryawan', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:50',
            'email' => 'required|email',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'jabatan' => 'required|string|max:100',
            'tanggal_masuk' => 'required|date',
            'gaji_pokok' => 'required|numeric',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'nik.required' => 'NIK wajib diisi.',
            'nik.max' => 'NIK tidak boleh lebih dari 50 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'no_hp.max' => 'No HP tidak boleh lebih dari 20 karakter.',
            'jabatan.max' => 'Jabatan tidak boleh lebih dari 100 karakter.',
            'jabatan.required' => 'jabatan wajib diisi.',
            'tanggal_masuk.date' => 'Tanggal masuk harus berupa tanggal yang valid.',
            'tanggal_masuk.required' => 'Tanggal Masuk wajib diisi.',
            'gaji_pokok.numeric' => 'Gaji pokok harus berupa angka.',
            'gaji_pokok.required' => 'Gaji pokok wajib diisi.',
        ]);

        // Cari data karyawan berdasarkan ID
        $karyawan = DataKaryawan::findOrFail($id);

        // Update data
        $karyawan->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,
            'tanggal_masuk' => $request->tanggal_masuk,
            'gaji_pokok' => $request->gaji_pokok,
            'status' => $request->status,
        ]);

    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()->route('datakaryawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deletedata = Datakaryawan::findOrFail($id);

        $deletedata->delete();

        return redirect()->route('datakaryawan.index')->with('success', 'Data Berhasil Dihapus');
    }
}
