@extends('layouts.app')

@section('title')
Profil Saya
@endsection

@section('content')
<main>
  <section class="section-details-header">
  </section>
  <section class="section-details-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 pl-lg-0 mx-auto">
          @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{ session('success') }}</strong>
          </div>
         
          @endif
          @if (session()->has('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> {{ session('error') }}</strong>
          </div>
         
          @endif
          <div class="card card-details">
            <h1>Profil Saya</h1>

            <form action="{{ route('profile.update') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                  value="{{ old('name', Auth::user()->name) }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">

                <label for="">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email',Auth::user()->email) }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Tempat Lahir</label>
                <input id="place_born" type="place_born" class="form-control @error('place_born') is-invalid @enderror"
                  name="place_born" value="{{ old('place_born',Auth::user()->place_born) }}">
                @error('place_born')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="date" class="form-control @error('date_born') is-invalid @enderror"
                  value="{{ old('date_born',Auth::user()->date_born) }}" name="date_born">
                @error('date_born')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <br>
                <input type="radio" name="gender" value="pria" @if(Auth::user()->gender === "pria") checked @endif >
                Pria
                <input type="radio" class="ml-4" name="gender" @if(Auth::user()->gender === "wanita") checked @endif
                value="wanita" > Wanita <br>
                @error('gender')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Telepon / Whatsapp</label>
                <input type="number" class="form-control @error('phone_number') is-invalid @enderror"
                  value="{{ old('phone_number',Auth::user()->phone_number) }}" name="phone_number">
                @error('phone_number')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Wilayah</label>
                <select name="region" id="" class="form-control @error('region') is-invalid @enderror"" required>
                  <option selected value=" {{ Auth::user()->region }}">{{ Auth::user()->region }}</option>
                  <option disabled>Pilih</option>
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
                  class="form-control @error('address') is-invalid @enderror">{{ old('address',Auth::user()->address) }}</textarea>
                @error('address')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-secondary">Ubah Profil</button>
            </form>
          </div>
          <div class="card card-details mt-4">
            <h1>Password Setting</h1>

            <form action="{{ route('profile.update.password') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="">Repeat Password</label>
                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror">
                @error('current_password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror">
                @error('new_password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-secondary">Ubah Password</button>
              <br>
              <br>
              <span class="" role="alert">
                * Hubungi admin jika ingin mereset password. <a href="https://wa.me/62" target="blank">Klik Disni</a>
              </span>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection