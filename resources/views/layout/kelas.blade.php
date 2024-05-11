@extends('main')

@section('tab-title')
@endsection

@section('cdn-links')
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="preload" as="style">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
@endsection

@section('content')
    <h3>Kelas Aktif</h3>
    <section class="card-list">

        <article class="card">
            <div class="card-header">
                <img src="{{ asset('assets/icon/flags/English.png') }}" alt="">
                <div class="level-badge">
                    3
                </div>
                {{-- <span class="tag">100 SKS</span>
                <h1>Bahasa Sapi</h1> --}}
            </div>
            <div class="card-body">
                <p>Jupri Meresapi, S.epeda</p>
            </div>
            <div class="card-footer space-between">
                <p><i class="bi bi-geo-alt"></i>X-001</p>
                <p><i class="bi bi-calendar-event"></i>Senin</p>
                <p><i class="bi bi-clock"></i>24.00</p>
            </div>
        </article>

        <article class="card">
            <div class="card-header">
                <img src="{{ asset('assets/icon/flags/Spanish.png') }}" alt="">
                <div class="level-badge">
                    3
                </div>
                {{-- <span class="tag">100 SKS</span>
                <h1>Bahasa Sapi</h1> --}}
            </div>
            <div class="card-body">
                <p>Jupri Meresapi, S.epeda</p>
            </div>
            <div class="card-footer space-between">
                <p><i class="bi bi-geo-alt"></i>X-001</p>
                <p><i class="bi bi-calendar-event"></i>Senin</p>
                <p><i class="bi bi-clock"></i>24.00</p>
            </div>
        </article>


        <article class="card">
            <div class="card-header">
                <img src="{{ asset('assets/icon/flags/Mandarin.png') }}" alt="">
                <div class="level-badge">
                    3
                </div>
                {{-- <span class="tag">100 SKS</span>
                <h1>Bahasa Sapi</h1> --}}
            </div>
            <div class="card-body">
                <p>Jupri Meresapi, S.epeda</p>
            </div>
            <div class="card-footer space-between">
                <p><i class="bi bi-geo-alt"></i>X-001</p>
                <p><i class="bi bi-calendar-event"></i>Senin</p>
                <p><i class="bi bi-clock"></i>24.00</p>
            </div>
        </article>
        <article class="card">
            <div class="card-header">
                <img src="{{ asset('assets/icon/flags/Japanese.png') }}" alt="">
                <div class="level-badge">
                    3
                </div>
                {{-- <span class="tag">100 SKS</span>
                <h1>Bahasa Sapi</h1> --}}
            </div>
            <div class="card-body">
                <p>Jupri Meresapi, S.epeda</p>
            </div>
            <div class="card-footer space-between">
                <p><i class="bi bi-geo-alt"></i>X-001</p>
                <p><i class="bi bi-calendar-event"></i>Senin</p>
                <p><i class="bi bi-clock"></i>24.00</p>
            </div>
        </article>






    </section>
@endsection
