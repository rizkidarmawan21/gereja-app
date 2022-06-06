@extends('layouts.success')

@section('title', 'Checkout Success')

@section('content')
<!-- main -->


@auth

<main>
  <div class="section-success d-flex align-items-center">

    <div class="col-12 col-lg-6 col-md-8 mx-auto">
      <div class="back my-4">
        <a href="{{ url('') }}" class="text-secondary">
          <i class="bi bi-arrow-left-circle-fill"></i>
          <span class="text-secondary">Back to Home</span>
        </a>
      </div>
      <div class="card card-ticket text-center" id="download-page">
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
          {{-- <p class=" mt-3">
            Tiket Digital anda telah terkirim melalui email yang terdaftar.
          </p> --}}
          <hr>
          <div class=" mt-4">
            <h4>
              {{ $ticket->event->title }}
            </h4>
          </div>
          <div class="detail-ticket  mt-3">
            <p>
              <i class="bi bi-calendar-event"></i>
              {{\Carbon\Carbon::create($ticket->event->start_date)->format('l, n F Y') }}
              <span class="ml-4"></span>
              <i class="bi bi-clock"></i>
              {{\Carbon\Carbon::createFromFormat('H:i:s',$ticket->event->start_time)->format('g.i A') }} -
              {{ \Carbon\Carbon::createFromFormat('H:i:s',$ticket->event->end_time)->format('g.i A') }}
            </p>
            <h3>{{$ticket->name }}</h3>
            <h5>Nomor Kursi <b>{{ $ticket->seat_number }}</b></h5>
          </div>
          <p class="mt-5 ">
            Silakan tunjukan tiket ini saat anda melakukan check in di tempat acara
          </p>
          <hr>
          <p>
            <b>
              @if($ticket->status_kehadiran == 0)
              Tiket Belum Digunakan
              @else
              Tiket telah digunakan
              @endif
            </b>
            <br>
            <small>
              Berlaku hingga {{ \Carbon\Carbon::create($ticket->event->start_date)->format('l, n F Y') }}
              / {{ \Carbon\Carbon::createFromFormat('H:i:s',$ticket->event->end_time)->format('g.i A') }}
            </small>
          </p>
        </div>
      </div>
      <div class="mt-4">
        <button class="btn btn-block btn-secondary mb-2" id="dl-png">Download Tiket</button>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
</main>

@endauth


@endsection

@push('addon-script')
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.13/dist/sweetalert2.all.min.js"></script>
<script>
  //script for sweetalert 2
// Swal.fire({
//   title: '<strong>Perhatian !</strong>',
//   icon: 'info',
//   html:
//     '<b>BERHASIL MELAKUKAN PENDAFTARAN</b> <br>'+
//     'Halaman ini hanya muncul satu kali setelah melakukan checkout tiket,harap SCREENSHOT tiket ini atau DOWNLOAD tiket ini',
// })

//script for html2canvas

const screenshotTarget = document.querySelector("#download-page");
    document.querySelector("#dl-png").onclick = function () {
        html2canvas(screenshotTarget).then(function (canvas) {
            const base64image = canvas.toDataURL("image/png");
            var anchor = document.createElement('a');
            anchor.setAttribute("href",base64image);
            anchor.setAttribute("download", "tiket.png");
            anchor.click();
            anchor.remove();
        });

        // alert("hello")
        // console.log(screenshotTarget)
    }

</script>
@endpush