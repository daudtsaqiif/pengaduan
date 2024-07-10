<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pengaduan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pengajuan = Pengaduan::latest()->get();
        $pengaduan = Pengaduan::count();
        $berat = Pengaduan::where('level', 'Berat')->count();
        $sedang = Pengaduan::where('level', 'Sedang')->count();
        $ringan = Pengaduan::where('level', 'Ringan')->count();
        $category = Category::where('status', true)->get();
        $requestCategory = Category::where('status', false)->get();

        return view('admin.index', compact('pengajuan', 'pengaduan', 'berat', 'ringan', 'sedang', 'category', 'requestCategory'));
    }

    public function status($id)
    {
        try {
            $pengajuan = Pengaduan::findOrFail($id);

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
            $pengajuan = Pengaduan::findOrFail($id);

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
            $pengajuan = Pengaduan::findOrFail($id);

            $pengajuan->delete();

            return redirect()->route('admin.index');
        } catch (\Throwable $th) {
            return redirect()->route('user.index');
        }
    }
}
