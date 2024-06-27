<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::latest()->get();
        $pengaduan = Pengajuan::count();
        $berat = Pengajuan::where('level', 'Berat')->count();
        $sedang = Pengajuan::where('level', 'Sedang')->count();
        $ringan = Pengajuan::where('level', 'Ringan')->count();

        return view('admin.index', compact('pengajuan', 'pengaduan', 'berat', 'ringan', 'sedang'));
    }

    public function status($id)
    {
        try {
            $pengajuan = Pengajuan::findOrFail($id);

            $pengajuan->update([
                "status" => true
            ]);

            return redirect()->route('admin.index');
        } catch (\Throwable $th) {
            return redirect()->route('user.index');
        }
    }

    public function reply(Request $request, $id)
    {
        try {
            $pengajuan = Pengajuan::findOrFail($id);

            $pengajuan->update([
                "status" => true,
                "reply" => $request->reply
            ]);

            return redirect()->route('admin.index');
        } catch (\Throwable $th) {
            return redirect()->route('user.index');
        }
    }

    public function delete($id)
    {
        try {
            $pengajuan = Pengajuan::findOrFail($id);

            $pengajuan->delete();

            return redirect()->route('admin.index');
        } catch (\Throwable $th) {
            return redirect()->route('user.index');
        }
    }
}
