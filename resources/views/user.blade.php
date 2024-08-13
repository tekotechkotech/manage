@extends('layouts.app')

@section('pengurus', 'active')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="">

                    @if (Auth::check())
                        <h5 class="card-title fw-semibold mb-0">Data Pengurus</h5>
                    @endif
                    <p class="mb-0">This is a data pengurus page </p>
                </div>
                <a href="{{ route('pengurus.create') }}" class="btn btn-dark ">Tambah Pengurus</a>
            </div>
            <hr>
            <table class="table table-bordered" id="pengurus-table">
                <thead>
                    <tr>
                        <th>No</th>
                            <th>Nama User</th>
                            <th>Nama Kelas</th>
                            <th>Nama Cabang</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#pengurus-table').DataTable({
                ordering: true,
                processing: true,
                serverSide: true,
                lengthMenu: [5, 10, 25, 50, 75, 100],
                pageLength: 5,
                responsive: true,
                ajax: "{{ route('user.getUser') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'user.name', name: 'user.name' },
                { data: 'kelas.name', name: 'kelas.name' },
                { data: 'cabang.name', name: 'cabang.name' },
            ],
            order: [[1, 'asc']],
            });
        });
    </script>
@endpush
