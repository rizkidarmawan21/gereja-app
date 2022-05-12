@extends('layouts.app')

@section('title', 'Detail Event')

@section('content')
<main>
  <section class="section-details-header">
  </section>
  <section class="section-details-content">
    <div class="container">
      <div class="row">
        <div class="col p-0">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                Event
              </li>
              <li class="breadcrumb-item active">
                Details
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        @if (session()->has('error'))     
        <div class="alert alert-danger alert-dismissible fade show col-lg-7" role="alert">
          {{ session('error') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="col-lg-7 pl-lg-0 ">
          <div class="card card-details">
            <h1>{{ $event->title }}</h1>
            <div class="gallery">
              <div class="xzoom-container">
                @if($event->thumbnail)
                <img src="{{ Storage::url($event->thumbnail) }}" alt="" class="xzoom" style="background-size: cover;">
                @else
                <img src="{{ url('frondend/images/pic_featured.jpg') }}" alt="" class="xzoom"
                  style="background-size: cover;">
                @endif
              </div>
            </div>
            <br>
            <br>
            <form action="{{ route('checkout') }}" method="post">
              @csrf
              <div class="form-group">
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <label for="name">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan nama anda">
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="phoneNumber">Telepon / Whatsapp</label>
                <input type="number" class="form-control @error('phoneNumber') is-invalid @enderror" id="phoneNumber" name="phoneNumber" placeholder="Masukan nomor telepon / whatsapp">
                 
                @error('phoneNumber')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                  <option value="">[ Pilih Kelamin ]</option>
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
                @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="age">Umur</label>
                <small id="age" class="form-text text-muted ">Usia kehadiran minimal 12 Tahun</small>
                <select class="form-control @error('age') is-invalid @enderror" id="age" name="age">
                  <option value="">[ Pilih Usia ]</option>
                  @for($i = 12; $i <= 80; $i++) <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                @error('age')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="status">Status Anggota</label>
                <select class="form-control @error('status_anggota') is-invalid @enderror" id="status" name="status_anggota">
                  <option value="">[ Pilih Status Anggota ]</option>
                  <option value="Jemaat">Jemaat</option>
                  <option value="Simpatika">Simpatika</option>
                </select>
                @error('status_anggota')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="region">Wilayah</label>
                <select class="form-control @error('capacity_id') is-invalid @enderror" id="region" name="capacity_id">
                  <option value="">[ Pilih Wilayah ]</option>
                  @foreach($event->capacities as $capacity)
                  <option value="{{ $capacity->id }}"
                  @if($capacity->kouta - getCountRegisterByCapacities($capacity->id) <= 0) 
                  disabled
                  @endif
                  >
                  <?php $koutaSisa = $capacity->kouta - getCountRegisterByCapacities($capacity->id) ?>
                  {{ $capacity->region }} / ( {{ $koutaSisa <= 0 ? "Kouta habis" : "Sisa kouta {$koutaSisa} "  }}) 
                  {{-- {{ $capacity->region }} / ( {{ $capacity->kouta - getCountRegisterByCapacities($capacity->id) <=}} ) --}}
                </option>
                  @endforeach
                </select>
                @error('region')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="transportasi">Kendaraan</label>
                <select class="form-control @error('transportasi') is-invalid @enderror" id="transportasi" name="transportasi">
                  <option value=" ">[ Pilih Kendaraan ]</option>
                  <option value="Roda 4">Roda 4</option>
                  <option value="Roda 2">Roda 2</option>
                  <option value="Umum">Umum</option>
                </select>
                @error('transportasi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <br>
              <br>
              <div class="question mt-2">
                <h2>
                  Apakah Anda sedang dalam keadaan sehat selama 14 hari terakhir ?(H-14 dihitung 2
                  Minggu sebelum ibadah)
                </h2>
                <small class="form-text text-muted font-italic">Tidak batuk,flu,demam,hilang penciumam,radang
                  teggorokan,atay penyakit lainnya yang diharuskan istirahat oleh dokter.</small>

                <div class="answers">
                  <input type="radio" name="answerQuestion1" value="sehat"> Saya sehat dalam 14 hari terakhir <br>
                  <input type="radio" name="answerQuestion1" value="kurang/tidak"> Saya tidak/kurang sehat dalam 14 hari
                  terakhir
                </div>
              </div>

          </div>
        </div>
        <div class="col-lg-5 mt-3 mt-lg-0 mt-md-3">
          <div class="card card-details card-right">
            <h2>Informasi Ibadah</h2>
            <span class="font-weight-bold mb-3">Event ini hanya berlaku untuk Wilayah

              <?php $i = 0 ?>
              @foreach($event->capacities as $data_capacity)
              {{ $data_capacity->region }}
              <?php $i++ ?>
              @if(count($event->capacities) > 1)
              @if($i === 1)
              dan
              @endif
              @endif
              @endforeach

            </span>
            <table class="trip-informations">
              <tr>
                <th width="50%">Tanggal</th>
                <td width="50%" class="text-right">
                  {{ \Carbon\Carbon::create($event->start_date)->format('l, n F Y') }}
                  {{-- {{
                  $event->start_date === $event->end_date ? '' : '-
                  '.\Carbon\Carbon::create($event->end_date)->format('n F
                  Y') }} --}}
                </td>
              </tr>
              <tr>
                <th width="50%">Waktu</th>
                <td width="50%" class="text-right">
                  {{ \Carbon\Carbon::createFromFormat('H:i:s',$event->end_time)->format('g.i
                  A') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s',$event->start_time)->format('g.i A') }}
                </td>
              </tr>
            </table>
            <hr>
            <h2>Informasi Kouta</h2>
            <table class="trip-informations">
              <tr>
                <th width="40%">Wilayah</th>
                <th width="30%">Kouta</th>
                <th width="30%" class="text-right">Sisa Kouta</th>
              </tr>
              @foreach($event->capacities as $capacity)
              <tr>
                <th width="40%">{{ $capacity->region }}</th>
                <td width="30%">{{ $capacity->kouta }} Jemaat</td>
                <td width="30%" class="text-right">{{ ($capacity->kouta - getCountRegisterByCapacities($capacity->id)) }} Jemaat</td>
              </tr>
              @endforeach
            </table>
            <hr>
            <p class="text-blue">
              Dengan ini Anda wajib mengikuti aturan
              protocol Kesehatan yang diterapkan oleh
              gereja

            </p>
            <br>
            <ol>
              <li>Menggunakan masker medis dengan benar
                <span class="text-danger font-weight-bold">BUKAN master scuba/buff</span> sejak masuk halaman
                gereja sampai pulan
              </li>
              <li>Cek suhu,cuci tangan,scan Aplikasi PeduliLindungi
                ,dan QR Code Registrasi Ulang sebelum masuk
                area gereja
              </li>
              <li>
                Menjaga Jarak dan tidak berkerumun di area
                gereja
              </li>
            </ol>
            <div class="">
              <input type="checkbox" required> Ya, Saya setuju
            </div>
          </div>

          <div class="join-container">
            <button type="submit" class="btn btn-block btn-join-now mt-3 py-2">
              Daftar Ibadah Sekarang
            </button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection