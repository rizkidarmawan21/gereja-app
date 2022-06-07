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

        <div class="card shadow col-12 col-md-12 col-lg-12 mr-5">
            <div class="card-body ">
                <form action="{{ route('jemaat.update',$jemaat->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name',$jemaat->name) }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <label for="">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email',$jemaat->email) }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input id="place_born" type="place_born"
                                    class="form-control @error('place_born') is-invalid @enderror" name="place_born"
                                    value="{{ old('place_born',$jemaat->place_born) }}">
                                @error('place_born')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('date_born') is-invalid @enderror"
                                    value="{{ old('date_born',$jemaat->date_born) }}" name="date_born">
                                @error('date_born')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <br>
                                <input type="radio" name="gender" value="pria" @if($jemaat->gender === "pria") checked
                                @endif > Pria
                                <input type="radio" class="ml-4" name="gender" value="wanita" @if($jemaat->gender ===
                                "wanita") checked @endif> Wanita <br>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Telepon / Whatsapp</label>
                                <input type="number" class="form-control @error('phone_number') is-invalid @enderror"
                                    value="{{ old('phone_number',$jemaat->phone_number) }}" name="phone_number">
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Wilayah</label>
                                <select name="region" id="" class="form-control @error('region') is-invalid @enderror"" required>
                                    <option selected value=" {{ $jemaat->region }}">{{ $jemaat->region }}
                                    </option>
                                    <option value=" Alam Sutera">Alam Sutera</option>
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
                                </select>
                                @error('region')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="address" id="" cols="30" rows="3"
                                    class="form-control @error('address') is-invalid @enderror">{{ old('address',$jemaat->address) }}</textarea>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm col-2" tabindex="-1" role="button">
                                Simpan
                            </button>

                </form>
                <a class="btn btn-warning btn-sm btn-reset-password col-3" tabindex="-1" role="button">
                    Reset Password
                </a>
                <form action="{{ route('jemaat.reset',$jemaat->id) }}" method="POST">
                    @csrf
                    @method('put')
                </form>
                <br>
                <br>
                <span class="ml-2"><small>*Jika melakukan reset password, sistem akan me-reset secara default
                        dengan
                        password "12345678"</small></span>
            </div>
        </div>
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
        $('.btn-reset-password').click(function (e) {
            Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Kamu ingin mereset akun ini ?",
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
                'Berhasil Direset!',
                'Password berhasil di reset',
                'success'
                )
    }

    {!! session('success') !!}

</script>
@endpush