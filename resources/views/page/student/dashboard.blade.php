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
    <section>
        <div class="card header-card-list">
            <i class="bi bi-exclamation-triangle"></i>
            <h3>Deadline Aktif</h3>
            <div class="badge">
                <span>3</span>
                Jam lagi
            </div>
        </div>

        <section class="scroll-card-list">
            @foreach ($course as $c )
                @foreach ($assign as $a )
                    @if ($c->COURSE_ID == $a->COURSE_ID)
                        @if ($today->isSameDay($a->DEADLINE))
                            <article class="card">
                                <div class="card-header">
                                    <span class="tag">Tugas</span>
                                    <h3>Bahasa {{$c->COURSE_NAME}}</h3>
                                    <div class="badge">
                                        @php
                                            $deadline = strtotime($a->DEADLINE);
                                            $todays = strtotime($today);
                                            $diff = abs($deadline - $todays)/3600;

                                        @endphp
                                        <span>{{ round($diff) }} </span>
                                         Jam lagi
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h2>{{$a->ASSIGNMENT_TITLE}}</h2>
                                    <p class="desc-3-lines">{{$a->ASSIGNMENT_DESC}}</p>
                                    <div class="icon-text"><i class="bi bi-calendar2-event"></i>{{$c->COURSE_CLASS}} , {{$c->COURSE_DAY}}</div>
                                    <div class="icon-text"><i class="bi bi-clock"></i>{{$a->DEADLINE}}</div>
                                    <div class="icon-text"><i class="bi bi-folder2-open"></i><a href="{{url("student/assignment/$a->ASSIGNMENT_ID")}}">lihat detail tugas</a>
                                    </div>
                                </div>
                                {{-- <div class="card-footer">
                                    <span class="tag">mp4</span>
                                    <span class="tag">Berkelompok dengan Sapi</span>
                                </div> --}}
                            </article>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </section>
    </section>


    <section>

        <div class="card header-card-list">
            <i class="bi bi-pencil"></i>
            <h3>Module Aktif</h3>
        </div>




        <section class="scroll-card-list">

            @foreach ($course as $c )
                @foreach ($assign as $a )
                    @if ($c->COURSE_ID == $a->COURSE_ID)
                        <article class="card">
                            <div class="card-header">
                                <span class="tag">Tugas</span>
                                <h3>Bahasa {{$c->COURSE_NAME}}</h3>
                            </div>
                            <div class="card-body">
                                <h2>{{$a->ASSIGNMENT_TITLE}}</h2>
                                <p class="desc-3-lines">{{$a->ASSIGNMENT_DESC}}</p>
                                <div class="icon-text"><i class="bi bi-calendar2-event"></i>{{$c->COURSE_CLASS}} , {{$c->COURSE_DAY}}</div>
                                <div class="icon-text"><i class="bi bi-clock"></i>{{$a->DEADLINE}}</div>
                                <div class="icon-text"><i class="bi bi-folder2-open"></i><a href="">lihat detail tugas</a>
                                </div>
                            </div>
                            {{-- <div class="card-footer">
                                <span class="tag">mp4</span>
                                <span class="tag">Berkelompok dengan Sapi</span>
                            </div> --}}
                        </article>
                    @endif
                @endforeach
            @endforeach

        </section>
    </section>


    <section>
        <div class="card header-card-list">
            <i class="bi bi-journal-code"></i>
            <h3>Materi Terbaru</h3>
        </div>


        <section class="scroll-card-list">
            @foreach ($materials as $m)
                <article class="card">
                    <div class="card-header">
                        <span class="tag">{{ $m->Course->COURSE_NAME }}</span>
                        <h3>{{ $m->MATERIAL_TITLE }}</h3>
                    </div>
                    <div class="card-body">
                        <h2>{{ $m->MATERIAL_TITLE }}</h2>
                        <p class="desc-3-lines">{{ $m->MATERIAL_DESC }}</p>
                    </div>

                    @foreach ($material_files as $file)
                        @if ($file->MATERIAL_ID == $m->MATERIAL_ID)
                            <div class="card-footer">
                                <div class="icon-text"><i class="bi bi-download"></i><a href="{{ url("student/classroom/".$m->Course->COURSE_ID."/download/material/$file->MATERIAL_FILE_PATH") }}">Download File Materi</a></div>
                            </div>
                        @else
                            <div class="card-footer">
                                <div class="icon-text"><p>Tidak ada file</p></div>
                            </div>
                        @endif
                    @endforeach
                </article>
            @endforeach
        </section>
    </section>
@endsection
