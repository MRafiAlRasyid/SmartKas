<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index(){
        $pengeluarans = pengeluaran::orderBy('id', 'desc')->get();
        return view('admin.pengeluaran.index', compact('pengeluarans'));
    }

    public function create(){
        return view('admin.pengeluaran.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'tanggal' => 'required',
            'perincian' => 'required',
            'pengeluaran' => 'required',
        ]);

        pengeluaran::create($validated);
        return redirect()->route('admin.pengeluaran.index')->with('success', 'Data Berhasil ditambahkan');
    }

    public function edit(String $id){
        $pengeluarans = pengeluaran::find($id);
        return view('admin.pengeluaran.edit', compact('pengeluarans'));
    }

    public function update(Request $request, String $id){
        $validated = $request->validate([
            'tanggal' => 'required',
            'perincian' => 'required',
            'pengeluaran' => 'required',
        ]);

        $pengeluarans = pengeluaran::find($id);
        $pengeluarans->update($validated);
        return redirect()->route('admin.pengeluaran.index')->with('success', 'Data berhasil diedit');
    }

    public function delete(String $id){
        $pengeluarans = pengeluaran::find($id);
        $pengeluarans->delete();
        return redirect()->route('admin.pengeluaran.index')->with('success', 'Data berhasil dihapus');
    }
}