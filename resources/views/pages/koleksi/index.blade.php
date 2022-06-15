@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Data Koleksi</h1>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('data-koleksi.create') }}" class="btn btn-primary mb-3">
                    Tambah Data Koleksi
                </a>
                <div class="table-responsive">
                    <table class="table text-nowrap table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nomor Inventaris</th>
                                <th>Nama Koleksi</th>
                                <th>Klasifikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->nomor_inventaris }}</td>
                                <td>{{ $item->nama_koleksi }}</td>
                                <td>{{ $item->klasifikasi }}</td>
                                <td>
                                    <a href="{{ route('data-koleksi.edit', $item->id) }}" class="btn btn-sm btn-primary">Ubah</a>
                                    <form action="{{ route('data-koleksi.destroy', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-hapus">Hapus</button>
                                    </form>
                                    <a href="{{ route('data-koleksi.cetak-qr-code', $item->id) }}" class="btn btn-warning btn-sm" target="_blank">Cetak Qr-Code</a>
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
            "ordering" : false
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
