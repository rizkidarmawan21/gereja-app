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

                            <div class="card mt-3">
                                <div class="card-body ">
                                    <h5>Ibadah 1</h5>
                                    <h6>Kode #0012</h6>
                                    <p class="desc text-black-50">
                                        <i class="bi bi-calendar-event"></i> Minggu, 10 April 2022
                                        <br>
                                        <i class="bi bi-clock"></i> 10.00 - 12.00
                                    </p>
                                    <hr>
                                    <div class="text-center">
                                        <a href="" class="btn btn-block btn-success">Lihat Tiket Saya <i class="ml-1 bi bi-arrow-right-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <div class="card-body ">
                                    <h5>Ibadah 2</h5>
                                    <h6>Kode #0012</h6>
                                    <p class="desc text-black-50">
                                        <i class="bi bi-calendar-event"></i> Minggu, 17 April 2022
                                        <br>
                                        <i class="bi bi-clock"></i> 10.00 - 12.00
                                    </p>
                                    <hr>
                                    <div class="text-center">
                                        <a href="" class="btn btn-block btn-success">Lihat Tiket Saya <i class="ml-1 bi bi-arrow-right-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection