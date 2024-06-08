@extends('layout/main')


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

@section("user-name")
    {{ $student->STUDENT_NAME }}
@endsection

@section("user-id")
    {{ $student->STUDENT_ID }}
@endsection

@section('content')
    <h3>Kelas Aktif</h3>
    <section class="card-list">
        @foreach ($courses as $c)
            <article class="card">
                <div class="card-header">
                    <img src="{{ asset("assets/icon/flags/$c->COURSE_NAME.png") }}" alt="">
                    <div class="level-badge">
                        {{ $c->COURSE_LEVEL }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="icon-text">
                        <i class="bi bi-mortarboard"></i>
                        {{ $c->Teacher->TEACHER_NAME }}
                    </div>
                    <div class="icon-text">
                        <i class="bi bi-person-video3"></i>
                        <a href="{{ url("/student/classroom/$c->COURSE_ID") }}">Lihat Detail Kelas</a>
                    </div>
                </div>
                <div class="card-footer space-between">
                    <p><i class="bi bi-geo-alt"></i>{{ $c->COURSE_CLASS }}</p>
                    <p><i class="bi bi-calendar-event"></i>{{ $c->COURSE_DAY }}</p>
                    <p><i class="bi bi-clock"></i>{{ $c->COURSE_LENGTH  }} hours</p>
                </div>
            </article>
        @endforeach
    </section>
@endsection
