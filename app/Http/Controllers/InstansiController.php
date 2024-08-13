<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InstansiController extends Controller
{
    public function index() {
        return view('instansi');
    }

    public function getInstansi() {
        
        // dd(route('pengurus.getPengurus'));
        $pengurus  = Instansi::with('cabang');

        // dd($pengurus);
        // dd($pengurus);

        $a =  DataTables::of($pengurus)
        ->addIndexColumn()
        ->filterColumn('instansi.nama', function($query, $keyword) {
            $query->whereHas('instansi', function($query) use ($keyword) {
                $query->where('nama', 'like', "%{$keyword}%");
            });
        })
        ->rawColumns(['instansi.nama'])
        ->make(true);

        return $a;
    }
}
