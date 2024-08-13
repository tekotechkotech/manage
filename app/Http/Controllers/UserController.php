<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function pengurus() {
        return view('pengurus');
    }

    public function getPengurus()
    {
        // dd(route('pengurus.getPengurus'));
        $pengurus  = Pengurus::with('user', 'cabang');

        // dd($pengurus);

        $a =  DataTables::of($pengurus)
        ->addIndexColumn()
        ->addColumn('user.name', function ($row) {
            return $row->user->name;
        })
        ->addColumn('cabang.name', function ($row) {
            return $row->cabang->nama;
        })
        ->filterColumn('user.name', function($query, $keyword) {
            $query->whereHas('user', function($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%");
            });
        })
        ->filterColumn('cabang.name', function($query, $keyword) {
            $query->whereHas('cabang', function($query) use ($keyword) {
                $query->where('nama', 'like', "%{$keyword}%");
            });
        })
        ->rawColumns(['user.name', 'cabang.name'])
        ->make(true);

        return $a;
    }
}
