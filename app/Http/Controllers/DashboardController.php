<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\PDF;
use App\Models\pemasukan;
use App\Models\pengeluaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index () {
        // Ambil data pemasukan dan pengeluaran
        $pemasukans = pemasukan::all(); 
        $pengeluarans = pengeluaran::all();

        // Gabungkan data pemasukan dan pengeluaran
        $mergeData = $pemasukans->concat($pengeluarans);

        // Urutkan berdasarkan tanggal dari terbaru ke terlama
        // $mergeData = $mergeData->sortByDesc('tanggal');
        $mergeData = $mergeData->sortByDesc(function($item) {
            return [$item->tanggal, $item->created_at]; // Urutkan berdasarkan tanggal dulu, lalu created_at
        });

        // Hitung total pemasukan, total pengeluaran dan total pengeluaran
        $totalPemasukan = $pemasukans->sum('pemasukan');
        $totalPengeluaran = $pengeluarans->sum('pengeluaran');
        $totalSaldo = $totalPemasukan - $totalPengeluaran;
        
        return view('admin.dashboard', compact('mergeData', 'totalPemasukan', 'totalPengeluaran', 'totalSaldo'));
    }

    public function search(Request $request){
        // Ambil input tanggal awal dan akhir
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Jika tidak ada input tanggal, tampilkan semua data
        if (empty($startDate) || empty($endDate)) {
            // Ambil semua data pemasukan dan pengeluaran
            $pemasukans = pemasukan::all();
            $pengeluarans = pengeluaran::all();
        } else {
            // Jika ada input tanggal, filter berdasarkan tanggal
            $pemasukans = pemasukan::whereBetween('tanggal', [$startDate, $endDate])->get();
            $pengeluarans = pengeluaran::whereBetween('tanggal', [$startDate, $endDate])->get();
        }

        // Gabungkan dan urutkan data
        $mergeData = $pemasukans->concat($pengeluarans)->sortByDesc(function($item) {
            return [$item->tanggal, $item->created_at];
        });

        // Hitung total pemasukan, pengeluaran, dan saldo
        $totalPemasukan = $pemasukans->sum('pemasukan');
        $totalPengeluaran = $pengeluarans->sum('pengeluaran');
        $totalSaldo = $totalPemasukan - $totalPengeluaran;

        // Kembalikan ke view dengan data yang difilter atau semua data
        return view('admin.dashboard', compact('mergeData', 'totalPemasukan', 'totalPengeluaran', 'totalSaldo'));
    }

    public function downloadPDFAll(){
        $pemasukans = pemasukan::all();
        $pengeluarans = pengeluaran::all();

        $mergeData = $pemasukans->concat($pengeluarans);

        $mergeData = $mergeData->sortBy(function($item) {
            return [$item->tanggal, $item->created_at];
        });

        $totalPemasukan = $pemasukans->sum('pemasukan');
        $totalPengeluaran = $pengeluarans->sum('pengeluaran');
        $totalSaldo = $totalPemasukan - $totalPengeluaran;

        $pdf = PDF::loadView('admin.downloadAll', compact('mergeData', 'totalPemasukan', 'totalPengeluaran', 'totalSaldo'));
        
        return $pdf->download('laporan keuangan.pdf');
    }

    public function downloadPDFByDate(Request $request){
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [
            'start_date.required' => 'Tanggal awal harus diisi lalu klik tombol search.',
            'end_date.required' => 'Tanggal akhir harus diisi lalu klik tombol search.',
            'end_date.after_or_equal' => 'Tanggal akhir tidak boleh lebih awal dari tanggal awal.',
        ]);

        $pemasukans = pemasukan::whereBetween('tanggal', [$startDate, $endDate])->get();
        $pengeluarans = pengeluaran::whereBetween('tanggal', [$startDate, $endDate])->get();

        $mergeData = $pemasukans->concat($pengeluarans);
        $mergeData = $mergeData->sortBy(function($item) {
            return [$item->tanggal, $item->created_at];
        });

        $totalPemasukan = $pemasukans->sum('pemasukan');
        $totalPengeluaran = $pengeluarans->sum('pengeluaran');
        $totalSaldo = $totalPemasukan - $totalPengeluaran;

        $pdf = PDF::loadView('admin.downloadByDate', compact('mergeData', 'totalPemasukan', 'totalPengeluaran', 'totalSaldo', 'startDate', 'endDate'));

        return $pdf->download('laporan keuangan.pdf');
    }
}