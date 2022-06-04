@extends('layouts.auth')
@section('title')
Daftar Jemaat
@endsection
@section('content')
<main>
    <div class="register">
        <div class="container">
            <div class="row page-login d-flex align-items-center pt-3 pb-3">
                <div class="section-left col-12 col-md-5 col-lg-6">
                    <h1 class="mb-4">Daftakan diri anda menjadi <br /> anggota kami</h1>
                    <img src="frondend/images/image-login.jpg" width="400" class=" d-none d-sm-flex" alt="">
                </div>
                <div class="section-right col-12 col-md-7 col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="frondend/images/logo.png" class="w-20 mb-4" alt="">
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label for="">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation">
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input id="place_born" type="place_born"
                                        class="form-control @error('place_born') is-invalid @enderror" name="place_born"
                                        value="{{ old('place_born') }}">
                                    @error('place_born')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('date_born') is-invalid @enderror"
                                        value="{{ old('date_born') }}" name="date_born">
                                    @error('date_born')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <br>
                                    <input type="radio" name="gender" value="pria"> Pria
                                    <input type="radio" class="ml-4" name="gender" value="wanita"> Wanita <br>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Telepon / Whatsapp</label>
                                    <input type="number"
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                        value="{{ old('phone_number') }}" name="phone_number">
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Wilayah</label>
                                    <select name="region" id=""
                                        class="form-control @error('region') is-invalid @enderror"" required>
                                        <option selected disabled>Pilih</option>
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
                                        class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-login btn-block">Daftar Menjadi Anggota</button>
                                </div>
                                <p class="text-center">
                                    <a href="{{ route('login') }}">Sudah memiliki akun ? Login</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection