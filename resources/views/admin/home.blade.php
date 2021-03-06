@extends('layout.adminNavbar')

@section('title')
    Admin - Home
@endsection
@section('content')
    @include('layout.message')
    <div class="container-fluid mt-5">
        <div class="welcome">
            <h3> Selamat datang Admin </h3>
            <h3> {{ $dashboard_data['admin']->name }} </h3>
        </div>
        <div class="date mb-5">
            <span> {{ $dashboard_data['date'] }} </span>
        </div>
    </div>

    <div class="container-fluid pl-5 pr-5 mb-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-admin" id="total-pengguna">
                    <p class="text-12"> Total Pengguna Saat Ini : </p>
                    <h1 class="text-bold"> {{ $dashboard_data['user_count'] }} </h1>
                    <div class="sub">
                        <div class="participant">
                            <p class="text-12"> Participant: </p>
                            <h3 class="text-bold"> {{ $dashboard_data['participant_count'] }}</h3>
                        </div>
                        <div class="campaigner">
                            <p class="text-12"> Campaigner: </p>
                            <h3 class="text-bold"> {{ $dashboard_data['campaigner_count'] }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <div class="card card-admin " id="validasi">
                            <p class="text-12"> Validasi Calon Campaigner:</p>
                            <h1 class="text-bold"> {{ $dashboard_data['waiting_campaigner'] }}</h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-admin" id="donasi-validasi">
                            <p class="text-12"> Event Donasi untuk Dikonfirmasi :</p>
                            <h1 class="text-bold"> {{ $dashboard_data['waiting_donation'] }} </h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-admin" id="petisi">
                            <p class="text-12"> Event Petisi untuk Dikonfirmasi :</p>
                            <h1 class="text-bold"> {{ $dashboard_data['waiting_petition'] }} </h1>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-admin transaction-confirmation">
                            <p class="text-12"> Transaksi donasi untuk Dikonfirmasi :</p>
                            <h1 class="text-bold"> {{ $dashboard_data['waiting_transaction'] }} </h1>
                        </div>
                    </div>
                </div>
                <div class="row bottom-right mt-4">
                    <div class="col-sm-12">
                        <div class="card card-admin" id="service">
                            <p class="text-bold"> Service </p>
                            <div class="chat">
                                <p> Chat dengan customer </p>
                                <a href="/inbox"><i class="fa fa-chevron-right mr-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 h-100">
            <div class="col-md-6">
                <div class="card card-admin height" id="pengajuan-donasi">
                    <div class="name">
                        <p> Donasi Terbaru </p>
                        <a href="/admin/donation" class="text-12">Lihat lainnya</a>
                    </div>
                    @foreach ($dashboard_data['list_donation_limited'] as $donation)
                        <a href="/donation/{{ $donation->id }}">
                            <div class="card card-sub mt-3">
                                <span> {{ $donation->title }} </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-admin height" id="pengajuan-petisi">
                    <div class="name">
                        <p> Petisi Terbaru </p>
                        <a href="/admin/petition" class="text-12">Lihat lainnya</a>
                    </div>
                    @foreach ($dashboard_data['list_petition_limited'] as $petition)
                        <a href="/petition/{{ $petition->id }}">
                            <div class="card card-sub mt-3">
                                <span> {{ $petition->title }} </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
