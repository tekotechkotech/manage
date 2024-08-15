<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use App\Models\PesertaDidik;
use App\Models\User;
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

    
    public function user() {
        return view('user');
    }
    
    public function getUser()
{
    // Query dengan relasi ke peserta_didik dan pengurus
    $pengurus = User::with(['pesertaDidik.kelas', 'pengurus.cabang']);

    $a = DataTables::of($pengurus)
        ->addIndexColumn()
        ->addColumn('user.name', function ($row) {
            return $row->name; // Mengakses langsung name dari user
        })
        ->addColumn('kelas.name', function ($row) {
            // Cek jika peserta_didik dan kelas ada, jika tidak tampilkan '-'
            return $row->peserta_didik && $row->peserta_didik->kelas ? $row->peserta_didik->kelas->nama : '-';
        })
        ->addColumn('cabang.name', function ($row) {
            // Cek jika pengurus dan cabang ada, jika tidak tampilkan '-'
            return $row->pengurus && $row->pengurus->cabang ? $row->pengurus->cabang->nama : '-';
        })
        ->filterColumn('user.name', function($query, $keyword) {
            $query->where('name', 'like', "%{$keyword}%");
        })
        ->filterColumn('kelas.name', function($query, $keyword) {
            $query->whereHas('peserta_didik.kelas', function($query) use ($keyword) {
                $query->where('nama', 'like', "%{$keyword}%");
            });
        })
        ->filterColumn('cabang.name', function($query, $keyword) {
            $query->whereHas('pengurus.cabang', function($query) use ($keyword) {
                $query->where('nama', 'like', "%{$keyword}%");
            });
        })
        ->rawColumns(['user.name', 'kelas.name', 'cabang.name'])
        ->make(true);

    return $a;
}

    
    public function pesertadidik() {
        return view('peserta_didik');
    }
    
    public function getPesertadidik()
    {
        // dd(route('pengurus.getPengurus'));
        $pengurus  = PesertaDidik::with('user', 'kelas');

        // dd($pengurus);

        $a =  DataTables::of($pengurus)
        ->addIndexColumn()
        ->addColumn('user.name', function ($row) {
            return $row->user->name;
        })
        ->addColumn('kelas.name', function ($row) {
            return $row->kelas ? $row->kelas->nama : '-'; 
        })
        ->filterColumn('user.name', function($query, $keyword) {
            $query->whereHas('user', function($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%");
            });
        })
        ->filterColumn('kelas.name', function($query, $keyword) {
            $query->whereHas('kelas', function($query) use ($keyword) {
                $query->where('nama', 'like', "%{$keyword}%");
            });
        })
        ->rawColumns(['user.name', 'kelas.name'])
        ->make(true);

        return $a;
    }

    public function logout(Request $request)     {         
		Auth::logout();         
		
		$request->session()->invalidate();         
		
		$request->session()->regenerateToken();          
		
		return redirect('/');     
	} 
}
