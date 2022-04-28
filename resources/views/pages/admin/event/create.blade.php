@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Event Baru</h1>
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

    <div class="card shadow col-12 col-md-6 col-lg-6">
        <div class="card-body ">
            <form action="{{ route('event.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Thumbnail</label>
                    <input type="file" class="form-control" name="thumbnail">
                    <small class="text-warning">Thumbnail / Pamflet harus beresolusi 2:1</small>
                </div>
                <div class="form-group">
                    <label for="">Judul Event</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Waktu Mulai</label>
                            <input type="time" class="form-control" name="start_time" value="{{ old('start_time') }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Waktu Selesai</label>
                            <input type="time" class="form-control" name="end_time" value="{{ old('end_time') }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection