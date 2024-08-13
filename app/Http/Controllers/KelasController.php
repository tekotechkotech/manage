<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KelasController extends Controller
{
    public function index() {
        return view('kelas');
    }

    public function getKelas() {
        
        // dd(route('pengurus.getPengurus'));
        $pengurus  = Kelas::with('cabang');

        // dd($pengurus);
        // dd($pengurus);

        $a =  DataTables::of($pengurus)
        ->addIndexColumn()
        ->addColumn('cabang.nama', function ($row) {
            return $row->cabang->nama;
        })
        ->filterColumn('cabang.nama', function($query, $keyword) {
            $query->whereHas('cabang', function($query) use ($keyword) {
                $query->where('nama', 'like', "%{$keyword}%");
            });
        })
        ->rawColumns(['cabang.nama', 'kelas.nama'])
        ->make(true);

        return $a;
    }
}
