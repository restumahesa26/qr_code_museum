@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Data Sub Kategori</h1>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('data-sub-kategori.create') }}" class="btn btn-primary mb-3">
                    Tambah Data Sub Kategori
                </a>
                <div class="table-responsive">
                    <table class="table text-nowrap table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->kategori->nama }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <a href="{{ route('data-sub-kategori.edit', $item->kode) }}" class="btn btn-sm btn-primary">Ubah</a>
                                    <form action="{{ route('data-sub-kategori.destroy', $item->kode) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-hapus">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">-- Data Kosong --</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend/assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ url('backend/assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ url('backend/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $("#dataTable").dataTable({
            "columnDefs": [
                { "sortable": false}
            ]
        });
    </script>
    <script>
        $('.btn-hapus').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Hapus Data?',
            text: "Data Akan Terhapus",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }else {
                    //
                }
            });
        });
    </script>

    @if(session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session()->get("success") }}'
        })
    </script>
    @endif
@endpush
