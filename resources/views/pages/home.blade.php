@extends('layouts.app')

@section('title')
Gereja
@endsection

@section('content')
<!-- Header -->
<header class="text-center">
  <h1>Explore The Beautiful World
    <br>
    As Easy One Click
  </h1>
  <p class="mt-3">
    You will see beautiful
    <br>
    moment you never see before
  </p>
  <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-4">
    Daftar Jemaat
  </a>
</header>

<main>
  <div class="container">
    <section class="section-stats row justify-content-center" id="stats">
      <div class="col-3 col-md-2 stats-detail">
        <h2>20K</h2>
        <p>Jemaat</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>12</h2>
        <p>Event</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>10</h2>
        <p>Pastor</p>
      </div>
    </section>
  </div>

  <section class="section-popular" id="event">
    <div class="container">
      <div class="row">
        <div class="col text-center section-popular-heading">
          <h2>Event</h2>
          <p>Event mingguan untuk <br>
            para anggota gereja dan simpatika</p>
        </div>
      </div>
  </section>

  <section class="section-popular-content" id="popularContent">
    <div class="container">
      <div class="section-popular-travel row justify-content-center">

        @foreach($events as $item)


        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card d-flex flex-column">
            <img
              src="{{ $item->thumbnail ? url('storage/'.$item->thumbnail) :  url('frondend/images/default_event.jpg') }}"
              class="card-img-top" alt="...">
            <div class="card-body ">
              <h5>{{ $item->title }}</h5>
              <p class="text-size">Khusus untuk wilayah
                <?php 
                  $i = 0; 
                  foreach($item->capacities as $data_capacity){
                    echo $data_capacity->region;
                    $i++;
                    if(count($item->capacities) > 1){
                      if ($i === 1) {
                        echo " dan ";
                      }
                    }
                  }
                
                ?>

                
            

              </p>
              <p class="card-text desc">
                <i class="bi bi-calendar-event"></i> &nbsp;{{ \Carbon\Carbon::create($item->start_date)->format('l, n F Y') }}
                {{-- {{
                $item->start_date === $item->end_date ? '' : '- '.\Carbon\Carbon::create($item->end_date)->format('n F
                Y') }} --}}
                <br>
                <i class="bi bi-clock"></i> &nbsp;{{ \Carbon\Carbon::createFromFormat('H:i:s',$item->end_time)->format('g:i
                A') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s',$item->start_time)->format('g:i A') }}
                <br>
                <i class="bi bi-people"></i>&nbsp; Kouta
                <?php
                $totalKouta = 0;

                foreach ($item->capacities as $data) {
                  $totalKouta += $data->kouta;
                }

                echo $totalKouta;
                ?>
                (Sisa Kouta <b>{{ $totalKouta - getCountRegisterByEvent($item->id) }}</b> Jemaat)
              </p>
            </div>
            <hr>
            <div class="btn-detail text-center">
              <a href="{{ route('detail', $item->slug) }}" class="btn btn-detail-event btn-block @if(($totalKouta - getCountRegisterByEvent($item->id)) == 0) disabled @endif" >@if(($totalKouta - getCountRegisterByEvent($item->id)) == 0) Kouta Habis @else Lihat Detail @endif</a>
            </div>
          </div>
        </div>

        @endforeach
      </div>
    </div>
  </section>

  <section class="section-testimonial-heading" id="pastor">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h2>Pastor</h2>
          <p>
            Moments were giving them
            <br />
            the best experience
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="section-testimonial-content" id="testimonialContent">
    <div class="container">
      <div class="section-popular-travel row justify-content-center">
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content">
              <img src="frondend/images/testi-1.png" alt="User" class="mb-4 rounded-circle">
              <h3 class="mb-4">Anggelita</h3>
              <p class="testimonial">" Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum illo harum
                nesciunt inventore optio. "
              </p>
            </div>
            <hr>
            <p class="trip-to mt-2">
              Trip to Bromo, Malang
            </p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content">
              <img src="frondend/images/testi-1.png" alt="User" class="mb-4 rounded-circle">
              <h3 class="mb-4">Anggelita</h3>
              <p class="testimonial">" Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum illo harum
                nesciunt inventore optio. "
              </p>
            </div>
            <hr>
            <p class="trip-to mt-2">
              Trip to Bromo, Malang
            </p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content">
              <img src="frondend/images/testi-1.png" alt="User" class="mb-4 rounded-circle">
              <h3 class="mb-4">Anggelita</h3>
              <p class="testimonial">" Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum illo harum
                nesciunt inventore optio. "
              </p>
            </div>
            <hr>
            <p class="trip-to mt-2">
              Trip to Bromo, Malang
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">Bantuan</a>
          <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-4 mx-1">Daftar Jemaat</a>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@push('addon-script')
<script>
  $(document).ready(function(){
    // Menambahkan smooth scrolling
    $("a").on('click', function(event) {
      if (this.hash !== "") {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){
          window.location.hash = hash;
        });
      }
    });
  });
</script>
@endpush