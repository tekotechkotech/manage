@extends('layouts.app')

@section('user','active')

@section('content')
<div class="card">
    @include('wave')
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-0">{{ $user->name }}</h2>
            <span class="mb-0 ">{{ $user->email }}</span><span class="mb-0">{{ $user->phone?$user->phone.' | ':''
                }}</span><span class="mb-0">{{ $user->tempat_lahir && $user->tanggal_lahir?$user->tempat_lahir.',
                '.$user->tanggal_lahir:'' }}</span>
            <p class="mb-0">{{ $user->alamat }}</p>
    </div>
</div>

<div class="card">
    <div class="card-header">

        <h5 class="card-title">Pengurus</h5>
    </div>
    <div class="card-body">
        <span class="">Cabang</span><br>
        <strong>{{ $user->pengurus->cabang->nama }}</strong>
        <p>{{ $user->pengurus->cabang->alamat }}</p>

        <div id="initial-content">
            <span class="">Hak Akses</span><br>
            @foreach (App\Models\HakAkses::whereIn('kode_akses', explode(' ', $user->pengurus->akses))->get() as $item)
                <a href="#" class="m-1 btn btn-sm btn-light">{{ $item->akses }}</a>
            @endforeach
            <a href="#" id="manage-access" class="m-1 btn btn-sm btn-dark">Kelola Akses</a>
        </div>
        
        <div id="manage-access-content" class="border p-1" style="border-radius: 10px; display: none;">
            @foreach (App\Models\HakAkses::whereIn('kode_akses', explode(' ', $user->pengurus->akses))->get() as $item)
                <a href="#" class="m-1 btn btn-sm btn-light">{{ $item->akses }} <i class="ti ti-x"></i></a>
            @endforeach
            <hr class="m-0 p-0">
            @foreach (App\Models\HakAkses::whereNotIn('kode_akses', explode(' ', $user->pengurus->akses))->get() as $item)
                <a href="#" class="m-1 btn btn-sm btn-light"><i class="ti ti-plus"></i> {{ $item->akses }}</a>
            @endforeach
        </div>
    </div>
    @push('script')
        
    <script type="text/javascript">
        $(document).ready(function() {
            // Saat tombol "Kelola Akses" diklik
            $('#manage-access').click(function(e) {
                console.log('sini');
                
                // e.preventDefault(); // Mencegah aksi default tautan
                // Sembunyikan konten awal dan tampilkan konten "Kelola Akses"
                $('#initial-content').hide();
                $('#manage-access-content').show();
            });
        });
        </script>
        @endpush
</div>
@endsection