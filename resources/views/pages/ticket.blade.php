@extends('layouts.success')

@section('title', 'Checkout Success')

@section('content')
<!-- main -->
<main>
    <div class="section-success d-flex align-items-center">
      
      <div class="col-12 col-lg-6 col-md-8 mx-auto">
        <div class="back my-4">
          <a href="index.html" class="text-secondary">
            <i class="bi bi-arrow-left-circle-fill"></i>
            <span class="text-secondary">Back to Home</span>
          </a>
        </div>
        <div class="card card-ticket text-center">
          <div class="circle-ticket-left"></div>
          <div class="circle-ticket-right"></div>
          <div class="card-header ">
            <h6>Tiket berhasil dicetak</h6>
          </div>
          <div class="card-body">
            <div class="logo text-center">
              <img src="frondend/images/logo.png" alt="">
              <h6>
                <span>Nama Gereja</span>
              </h6>
            </div>
            <p class=" mt-3">
            Tiket Digital anda telah terkirim melalui email yang terdaftar.
            </p>
            <hr>
            <div class=" mt-4">
              <h4>Ibadah 1</h4>
            </div>
            <div class="detail-ticket  mt-3">
             <p>
              <i class="bi bi-calendar-event"></i> Minggu, 10 April 2022
              <span class="ml-4"></span>
              <i class="bi bi-clock"></i> 10.00 - 12.00
             </p>
             <h3>Dwi Welson</h3>
             <h5>Kode Tiket <b>#98121</b></h5>
            </div>
            <p class="mt-5 ">
              Silakan tunjukan tiket ini saat anda melakukan check in di tempat acara
            </p>
            <hr>
            <p>
              <b>Tiket Belum Digunakan</b>
              <br>
              <small>
                Berlaku hingga  10 April 2022 / 12.00
              </small>
            </p>
            <div class="mt-4">
              <a href="" class="btn  btn-block btn-secondary mb-2"><i class="bi bi-printer-fill"></i> Cetak Tiket</a>
              <form action="">
                <button type="button" class="btn btn-danger btn-block"><i class="bi bi-x-circle-fill"></i> Batalkan Tiket</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
  </main>
@endsection