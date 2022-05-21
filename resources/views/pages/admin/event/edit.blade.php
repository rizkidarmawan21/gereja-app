@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Event</h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    .<div class="row">

        <div class="card shadow col-12 col-md-12 col-lg-5 mr-5">
            <div class="card-body ">
                <form action="{{ route('event.update',$event->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="">Thumbnail</label>
                        <input type="file" class="form-control" name="thumbnail">
                        <small class="text-warning">Thumbnail / Pamflet harus beresolusi 2:1</small>
                    </div>
                    <div class="form-group">
                        <label for="">Judul Event</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title',$event->title) }}"
                            required>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Waktu Mulai</label>
                                <input type="time" class="form-control" name="start_time"
                                    value="{{ old('start_time',$event->start_time) }}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Waktu Selesai</label>
                                <input type="time" class="form-control" name="end_time"
                                    value="{{ old('end_time',$event->end_time) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Tanggal Mulai</label>
                                <input type="date" class="form-control" name="start_date"
                                    value="{{ old('start_date',$event->start_date) }}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Tanggal Selesai</label>
                                <input type="date" class="form-control" name="end_date"
                                    value="{{ old('end_date',$event->end_date) }}" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>

            </div>
        </div>

        <div class="card shadow col-12 col-md-12 col-lg-5 mt-3 mt-lg-0">
            <div class="card-body ">
                <h3 class="mb-3">Atur Wilayah dan Kouta Event</h3>
                <form action="{{ route('capacity.store',$event->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Wilayah</label>
                                <select name="region" id="" class="form-control" required>
                                    <option selected disabled>Choose </option>
                                    <option value="Umum">Umum</option>
                                    <option value="" disabled>---- Untuk Jemaat ----</option>
                                    <option value="Alam Sutera">Alam Sutera</option>
                                    <option value="Anggrek Loka">Anggrek Loka</option>
                                    <option value="Batan Indah">Batan Indah</option>
                                    <option value="Cardolyne">Cardolyne</option>
                                    <option value="Cikoleang">Cikoleang</option>
                                    <option value="Dago Buaran">Dago Buaran</option>
                                    <option value="Delatinos">Delatinos</option>
                                    <option value="Foresta">Foresta</option>
                                    <option value="Giri Loka">Giri Loka</option>
                                    <option value="Griya Loka">Griya Loka</option>
                                    <option value="Kencana Loka">Kencana Loka</option>
                                    <option value="Melati Mas">Melati Mas</option>
                                    <option value="Nusa Loka">Nusa Loka</option>
                                    <option value="Pos Jemaat Cikoleang">Pos Jemaat Cikoleang</option>
                                    <option value="Pos Jemaat Pagedangan">Pos Jemaat Pagedangan</option>
                                    <option value="Puspiptek">Puspiptek</option>
                                    <option value="Suradita">Suradita</option>
                                    <option value="" disabled>---- Untuk Participan ----</option>
                                    <option value="Bandung">Bandung</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Kouta</label>
                                <input type="number" class="form-control" name="kouta" value="{{ old('kouta') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>

                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Wilayah</th>
                            <th scope="col">Kouta</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($event->capacities as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->region }}</td>
                            <td>{{ $item->kouta }}</td>
                            <td>
                                <button type="button" id="buttonEdit" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#exampleModal" data-id="{{ route('capacity.edit',$item->id) }}">
                                    Edit
                                </button>
                                <form action="{{ route('capacity.destroy',$item->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus ?')">Del</button>
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

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Wilayah dan Kouta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="formEditCapacity">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <small class="text-danger">Disarankan <b>TIDAK</b> mengubah wilayah ketika event sedang
                            berangsung !</small>
                        <label for="">Wilayah</label>
                        <select name="region" id="regionEdit" class="form-control" required>
                            <option value="Umum">Umum</option>
                            <option value="" disabled>---- Untuk Jemaat ----</option>
                            <option value="Alam Sutera">Alam Sutera</option>
                            <option value="Anggrek Loka">Anggrek Loka</option>
                            <option value="Batan Indah">Batan Indah</option>
                            <option value="Cardolyne">Cardolyne</option>
                            <option value="Cikoleang">Cikoleang</option>
                            <option value="Dago Buaran">Dago Buaran</option>
                            <option value="Delatinos">Delatinos</option>
                            <option value="Foresta">Foresta</option>
                            <option value="Giri Loka">Giri Loka</option>
                            <option value="Griya Loka">Griya Loka</option>
                            <option value="Kencana Loka">Kencana Loka</option>
                            <option value="Melati Mas">Melati Mas</option>
                            <option value="Nusa Loka">Nusa Loka</option>
                            <option value="Pos Jemaat Cikoleang">Pos Jemaat Cikoleang</option>
                            <option value="Pos Jemaat Pagedangan">Pos Jemaat Pagedangan</option>
                            <option value="Puspiptek">Puspiptek</option>
                            <option value="Suradita">Suradita</option>
                            <option value="" disabled>---- Untuk Participan ----</option>
                            <option value="Bandung">Bandung</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kouta</label>
                        <input type="number" id="koutaEdit" class="form-control" name="kouta" value="{{ old('kouta') }}"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function () {
    
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    
    $('body').on('click', '#buttonEdit', function (event) {
    
        event.preventDefault();
        var url = $(this).data('id');

        $.get(url, function (data) {
            $('#regionEdit').append('<option value="'+data.data.region+'" selected>'+data.data.region+'</option>');
            $('#koutaEdit').val(data.data.kouta);
            var urlAction = '{{ route("capacity.update",":id") }}';
            urlAction = urlAction.replace(":id", data.data.id);
            $('#formEditCapacity').attr('action', urlAction);
         })
    });
    
    }); 
</script>
@endpush