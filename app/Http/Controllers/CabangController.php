<?php

namespace App\Http\Controllers;

use App\Models\InstansiCabang;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CabangController extends Controller
{
    public function index() {
        return view('cabang');
    }

    
    public function getCabang() {
        
        // dd(route('pengurus.getPengurus'));
        $pengurus  = InstansiCabang::with('instansi');

        // dd($pengurus);
        // dd($pengurus);

        $a =  DataTables::of($pengurus)
        ->addIndexColumn()
        ->addColumn('instansi.nama', function ($row) {
            return $row->instansi->nama;
        })
        ->filterColumn('instansi.nama', function($query, $keyword) {
            $query->whereHas('instansi', function($query) use ($keyword) {
                $query->where('nama', 'like', "%{$keyword}%");
            });
        })
        ->rawColumns(['instansi.nama', 'cabang.nama'])
        ->make(true);

        // dd($a);

        return $a;
    }
}
