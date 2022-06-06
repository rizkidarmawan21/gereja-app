@extends('layouts.app')

@section('title')
Event Saya
@endsection

@section('content')
    <main>
        <section class="section-details-header">
        </section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 pl-lg-0 mx-auto">
                        <div class="card card-details">
                            <h1>Event Saya</h1>

                            @foreach($events as $item)      
                            <div class="card mt-3">
                                <div class="card-body ">
                                    <h5>{{ $item->name }}</h5>
                                    <h6>{{ $item->event->title }}</h6>
                                    <h6>Nomor Kursi {{ $item->seat_number }}</h6>
                                    <p class="desc text-black-50">
                                        <i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::create($item->event->start_date)->format('l, n F Y') }}
                                        <br>
                                        <i class="bi bi-clock"></i> {{ \Carbon\Carbon::createFromFormat('H:i:s',$item->event->start_time)->format('g:i A') }} - {{
                                            \Carbon\Carbon::createFromFormat('H:i:s',$item->event->end_time)->format('g:i A') }}
                                    </p>
                                    <hr>
                                    <div class="text-center">
                                        @if($item->status_kehadiran == 0)
                                        <a href="{{ route('my-ticket',$item->id) }}" class="btn btn-block btn-success">Lihat Tiket Saya <i class="ml-1 bi bi-arrow-right-circle"></i></a>
                                        @else
                                        <a href="" class="btn btn-block btn-secondary disabled">Tiket Telah Digunakan </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection