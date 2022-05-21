@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pendaftar Ibadah</h1>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-expanded="false">
                Pilih Event
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('reg_ibadah.index') }}">Semua Data Pendaftar</a>
                @foreach($event as $item)
                <a class="dropdown-item" href="{{ route('byEvent',$item->id) }}">{{ $item->title }}</a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Menampilkan {{ $titlePage }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            {{-- <th>No</th> --}}
                            <th>Nomor Kursi</th>
                            <th>Nama Jemaat</th>
                            <th>Status Anggota</th>
                            <th>Event</th>
                            <th>Wilayah</th>
                            <th>Gender / Umur</th>
                            <th>Telepon</th>
                            <th>Transportasi</th>
                            <th>Kehadiran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($regIbadah as $item)
                        <tr>
                            {{-- <td>{{ $loop->iteration }}</td> --}}
                            <td>{{ $item->seat_number }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->status_anggota }}</td>
                            <td>{{ $item->event->title }}</td>
                            <td>{{ $item->capacities->region }}</td>
                            <td>{{ $item->gender }} - {{ $item->age }} Thn</td>
                            <td>{{ $item->phoneNumber }}</td>
                            <td>{{ $item->transportasi }}</td>
                            <td>
                                @if($item->status_kehadiran == 0)
                                <span class="badge badge-pill badge-danger">Belum Hadir / Absen</span>
                                @else
                                <span class="badge badge-pill badge-success">Sudah Hadir / Absen</span>
                                @endif
                            </td>
                            <td>
                                <button type="submit" class="btn btn-warning btn-set-hadir btn-sm">Set
                                    Hadir</button>
                                <form action="{{ route('reg_ibadah.update',$item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                </form>
                                <button type="submit" class="btn-sm btn btn-danger btn-delete mb-3 mt-lg-2">Del</button>
                                <form class="mt-lg-2" action="{{ route('reg_ibadah.destroy',$item->id) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

@push('addon-style')
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.25/af-2.3.7/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/cr-1.5.4/date-1.1.0/fc-3.3.3/fh-3.1.9/kt-2.6.2/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.4/sb-1.1.0/sp-1.3.0/sl-1.3.3/datatables.min.css" />
@endpush

@push('addon-script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.25/af-2.3.7/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/cr-1.5.4/date-1.1.0/fc-3.3.3/fh-3.1.9/kt-2.6.2/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.4/sb-1.1.0/sp-1.3.0/sl-1.3.3/datatables.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.13/dist/sweetalert2.all.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ url('backend/js/datatables-config.js') }}"></script>
<script>
    // confirm for delete
    $(document).ready(function(){
        $('.btn-delete').click(function (e) {
            Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Kamu ingin menghapus data ini ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Berhasil Dihapus!',
                'Data anda berhasil dihapus',
                'success'
                )
                $(this).next('form').submit();
            }
            })
        });

        $('.btn-set-hadir').click(function (e) {
            // Show success message
            Swal.fire(
            'Berhasil!',
            'Update kehadiran berhasil',
            'success'
            )
            $(this).next('form').submit();
        });
    });

    // confir for set hadir
    // $(document).ready(function(){


    // });
</script>
@endpush