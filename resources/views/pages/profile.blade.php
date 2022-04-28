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
            <div class="card card-details">
              <h1>Profil Saya</h1>

              <form>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Nama Lengkap</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Tanggal Lahir</label>
                  <input type="date" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Jenis Kelamin</label>
                  <br>
                  <input type="radio" name="gender" value="pria"> Pria
                  <input type="radio" class="ml-4" name="gender" value="Wanita" checked> Wanita <br>
                </div>
                <div class="form-group">
                  <label for="">Telepon / Whatsapp</label>
                  <input type="number" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Alamat</label>
                  <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-secondary">Ubah Profil</button>
              </form>
            </div>
            <div class="card card-details mt-4">
              <h1>Password Setting</h1>

              <form>
                <div class="form-group">
                  <label for="">Repeat Password</label>
                  <input type="password" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-secondary">Ubah Password</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection