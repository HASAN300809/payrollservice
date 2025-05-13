<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    public function index()
    {
        $presensis = Presensi::where('username', Auth::user()->name)->get();

        return view('presensi.index', compact('presensis'));
    }

    public function indexadmin()
    {
        $presensis = Presensi::latest()->get();

        return view('presensi.indexadmin', compact('presensis'));
    }

    public function store(Request $request)
    {
        // cek apakah sudah presensi hari ini
        $sudahpresensi = Presensi::where('username', Auth::user()->name)->where('tanggal', date('Y-m-d'))->exists();

        if ($sudahpresensi) {
            return back()->with('error', 'Anda sudah presensi hari ini');
        }

        Presensi::create([
            'username' => Auth::user()->name,
            'tanggal' => date('Y-m-d'),
            'jam_masuk' => now()->setTimezone('Asia/Jakarta')->format('H:i:s'),
        ]);

        return back()->with('success', 'Presensi berhasil');
    }

    public function presensikeluar(Request $request)
    {
        $presensi = Presensi::where('username', Auth::user()->name)->where('tanggal', date('Y-m-d'))->first();

        if (!$presensi) {
            return back()->with('error', 'Anda belum presensi masuk hari ini');
        }

        if ($presensi->jam_keluar) {
            return back()->with('error', 'Anda sudah presensi keluar hari ini');
        }

        $presensi->update([
            'jam_keluar' => now()->setTimezone('Asia/Jakarta')->format('H:i:s'),
        ]);

        return back()->with('success', 'Presensi keluar berhasil');
    }

    public function destroy(string $id)
    {
        $deletedata = Presensi::findOrFail($id);

        $deletedata->delete();

        return redirect()->route('admin.presensi')->with('success', 'Data Berhasil Dihapus');
    }
}
