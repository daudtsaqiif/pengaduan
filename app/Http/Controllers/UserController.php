<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pengaduan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $pengajuan = Pengaduan::latest()->get();
        $category = Category::where('status', true)->get();

        return view('frontend.index', compact('pengajuan', 'category'));
    }

    public function store(Request $request) {
        $request->validate([
            'pengaduan' => 'required',
            'level' => 'required',
            'category_id' => 'required'
        ]);

        Pengaduan::create([
            'pengaduan' => $request->pengaduan,
            'level' => $request->level,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('user.index');
    }

    public function requestCategory(Request $request){
        Category::create([
            'name' => $request->name,
            'status' => false
        ]);


        return redirect()->route('user.index');
    }

}
