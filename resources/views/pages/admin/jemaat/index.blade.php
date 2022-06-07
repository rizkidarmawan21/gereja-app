@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Jemaat Gereja</h1>
    </div>



    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100" collspancing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Telepon</th>
                            <th>Wilayah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->region }}</td>
                            <td>
                                <a href="{{ route('jemaat.edit', $item->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <button type="submit" class="btn btn-sm btn-danger btn-delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <form action="{{ route('jemaat.destroy', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection


@push('addon-script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.13/dist/sweetalert2.all.min.js"></script>
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
                
                $(this).next('form').submit();
            }
            })
        });
    });

    // confirm for delete
    function deleteConfirm(){
        Swal.fire(
                'Berhasil Dihapus!',
                'Data anda berhasil dihapus',
                'success'
                )
    }
    // confirm for edit
    function editConfirm(){
        Swal.fire(
                'Berhasil Dihapus!',
                'Data anda berhasil dihapus',
                'success'
                )
    }

    {!! session('success') !!}

</script>
@endpush