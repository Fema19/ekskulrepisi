<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Ekskul;
use App\Models\Jabatan;
use App\Models\Kegiatan;
use App\Models\Pembina;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Get current counts
            $totalAnggota = Anggota::count();
            $totalEkskul = Ekskul::count();
            $totalJabatan = Jabatan::count();
            $totalKegiatan = Kegiatan::count();
            $totalPembina = Pembina::count();

            // Get trend data for the last 7 days
            $today = now();
            $lastWeek = now()->subDays(6);

            // Generate array of dates for the last 7 days
            $dates = collect();
            for ($i = 0; $i < 7; $i++) {
                $dates->push($today->copy()->subDays($i)->format('Y-m-d'));
            }

            // Get anggota trend data
            $anggotaData = Anggota::whereBetween('created_at', [$lastWeek, $today])
                ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
                ->groupBy('date')
                ->orderBy('date')
                ->pluck('count', 'date')
                ->toArray();

            // Fill in missing dates with zeros
            $anggotaTrend = $dates->map(function ($date) use ($anggotaData) {
                return $anggotaData[$date] ?? 0;
            })->reverse()->values()->toArray();

            // Get kegiatan trend data
            $kegiatanData = Kegiatan::whereBetween('created_at', [$lastWeek, $today])
                ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
                ->groupBy('date')
                ->orderBy('date')
                ->pluck('count', 'date')
                ->toArray();

            // Fill in missing dates with zeros
            $kegiatanTrend = $dates->map(function ($date) use ($kegiatanData) {
                return $kegiatanData[$date] ?? 0;
            })->reverse()->values()->toArray();

            // Jumlah anggota baru hari ini
            $anggotaBaruHariIni = Anggota::whereDate('created_at', today())->count();

            // Ambil ekskul beserta anggotanya, urutkan berdasarkan jumlah anggota
            $ekskulDenganAnggota = Ekskul::with([
                'anggota' => function ($query) {
                    $query->with(['jabatan'])->orderBy('generasi', 'desc');
                }
            ])->get()->sortByDesc(function ($ekskul) {
                return $ekskul->anggota->count();
            });

            // Get unique generations for filtering
            $generasiList = Anggota::select('generasi')
                ->distinct()
                ->orderBy('generasi', 'desc')
                ->pluck('generasi');

            return view('dashboard', compact(
                'totalAnggota',
                'totalEkskul',
                'totalJabatan',
                'totalKegiatan',
                'totalPembina',
                'anggotaBaruHariIni',
                'ekskulDenganAnggota',
                'generasiList',
                'anggotaTrend',
                'kegiatanTrend'
            ));

        } catch (\Exception $e) {
            Log::error('Error in DashboardController@index: ' . $e->getMessage());
            return view('dashboard', [
                'totalAnggota' => 0,
                'totalEkskul' => 0,
                'totalJabatan' => 0,
                'totalKegiatan' => 0,
                'totalPembina' => 0,
                'anggotaBaruHariIni' => 0,
                'ekskulDenganAnggota' => collect([]),
                'anggotaTrend' => array_fill(0, 7, 0),
                'kegiatanTrend' => array_fill(0, 7, 0),
                'generasiList' => collect([]),
            ]);
        }
    }
}
