<?php

namespace App\Http\Controllers;

use App\Models\pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index(){
        $pemasukans = pemasukan::orderBy('id', 'desc')->get();
        return view('admin.pemasukan.index', compact('pemasukans'));
    }

    public function create(){
        return view('admin.pemasukan.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'tanggal' => 'required',
            'perincian' => 'required',
            'pemasukan' => 'required',
        ]);

        pemasukan::create($validated);
        return redirect()->route('admin.pemasukan.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(String $id){
        $pemasukans = pemasukan::find($id);
        return view('admin.pemasukan.edit', compact('pemasukans'));
    }

    public function update(Request $request, String $id){
        $validated = $request->validate([
            'tanggal' => 'required',
            'perincian' => 'required',
            'pemasukan' => 'required',
        ]);

        $pemasukans = pemasukan::find($id);
        $pemasukans->update($validated);
        return redirect()->route('admin.pemasukan.index')->with('success', 'Data berhasil diedit');
    }

    public function delete(String $id){
        $pemasukans = pemasukan::find($id);
        $pemasukans->delete();
        return redirect()->route('admin.pemasukan.index')->with('success', 'Data berhasil dihapus');
    }
}