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

@section('content')
    <h3>Kelas Aktif</h3>



    <section class="card-list">

        <div class="card-list grid-2">
            @forelse ($courses as $c)
                <article class="card">
                    <div class="card-header">
                        <img src="{{ asset("assets/icon/flags/$c->COURSE_NAME.png") }}" alt="">
                        <div class="level-badge">
                            {{ $c->COURSE_LEVEL }}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="icon-text">
                            <i class="bi bi-hash"></i>
                            {{ $c->COURSE_ID }}
                        </div>
                        <div class="icon-text">
                            <i class="bi bi-mortarboard"></i>
                            {{ $c->Teacher->TEACHER_NAME }}
                        </div>
                        <div class="icon-text">
                            <i class="bi bi-person-video3"></i>
                            <a href="{{ url("teacher/classroom/$c->COURSE_ID") }}">Lihat Detail Kelas</a>
                        </div>
                    </div>
                    <div class="card-footer space-between">
                        <p><i class="bi bi-geo-alt"></i>{{ $c->COURSE_CLASS }}</p>
                        <p><i class="bi bi-calendar-event"></i>{{ $c->COURSE_DAY }}</p>
                        <p><i class="bi bi-clock"></i>{{ $c->COURSE_LENGTH }} hours</p>
                    </div>
                </article>
            @empty
            @endforelse
        </div>


        <div class="card-list">
            <article class="card">
                <div class="card-header">
                    <h1>Create Class</h1>
                </div>


                <div class="card-body">
                    <form action="{{ url('teacher/add/classroom') }}" method="post">
                        @csrf
                        <div class="input-group @error('COURSE_NAME') input-danger @enderror">
                            <label for="">Course Name</label>
                            <div class="input-text-icon">
                                <i class="bi bi-quote"></i>
                                <input type="text" name="COURSE_NAME" id="" placeholder="Course Name" value="">
                            </div>
                            @error('COURSE_NAME')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-group @error('COURSE_DESC') input-danger @enderror">
                            <label for="">Course Description</label>
                            <div class="input-text-icon">
                                <i class="bi bi-text-paragraph"></i>
                                <input type="text" name="COURSE_DESC" id="" placeholder="Course Desc"
                                    value="">
                            </div>
                            @error('COURSE_DESC')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-group @error('COURSE_LEVEL') input-danger @enderror">
                            <label for="">Course Level</label>
                            <div class="input-text-icon">
                                <i class="bi bi-suit-diamond"></i>
                                <input type="number" min="1" max="4" name="COURSE_LEVEL" id="" placeholder="Course Level"
                                    value="">
                            </div>
                            @error('COURSE_LEVEL')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-group @error('COURSE_CLASS') input-danger @enderror">
                            <label for="">Course Class</label>
                            <div class="input-text-icon">
                                <i class="bi bi-geo-alt"></i>
                                <input type="text" name="COURSE_CLASS" id="" placeholder="Course Location"
                                    value="">
                            </div>
                            @error('COURSE_CLASS')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-group @error('COURSE_DAY') input-danger @enderror">
                            <label for="">Course Day</label>
                            <div class="input-text-icon">
                                <i class="bi bi-calendar2-event"></i>
                                <input type="text" name="COURSE_DAY" id="" placeholder="Course Day"
                                    value="">
                            </div>
                            @error('COURSE_DAY')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-group @error('COURSE_LENGTH') input-danger @enderror">
                            <label for="">Course Length</label>
                            <div class="input-text-icon">
                                <i class="bi bi-clock"></i>
                                <input type="text" name="COURSE_LENGTH" id="" placeholder="Course Length"
                                    value="">
                            </div>
                            @error('COURSE_LENGTH')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit">Create</button>
                    </form>
                </div>
            </article>
        </div>
    </section>
@endsection
