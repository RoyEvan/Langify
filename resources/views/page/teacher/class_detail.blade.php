@extends('layout/main')


@section('tab-title')
    Langify
@endsection

@section('cdn-links')
    <link rel="stylesheet" href="{{ asset('assets/css/detailKelas.css') }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="preload" as="style">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
@endsection

@section('content')
    <header class="class-banner card" role="banner">
        <div class="card-body">
            <h2>{{ $course->COURSE_NAME }}</h2>
            <p>{{ $course->COURSE_DESC }}</p>
        </div>
        <div class="card-footer">
            <p><i class="bi bi-people"></i>{{ count($students) }} People</p>
            <p><i class="bi bi-mortarboard"></i>{{ $course->Teacher->TEACHER_NAME }}</p>
            <p><i class="bi bi-geo-alt"></i>{{ $course->COURSE_CLASS }}</p>
            <p><i class="bi bi-calendar-event"></i>{{ $course->COURSE_DAY }}</p>
            <p><i class="bi bi-clock"></i>{{ $course->COURSE_LENGTH }} hours</p>
        </div>
    </header>


    <div id="class-tabs-nav" class="tabs-nav-box card">
        <button class="tabs-item active">Beranda</button>
        <button class="tabs-item">Daftar Mahasiswa</button>
        <button class="tabs-item">Materi</button>
        <button class="tabs-item">Tugas</button>
        <button class="tabs-item">Module</button>
    </div>


    <div id="class-tabs-content" class="tabs-content-box">
        <!-- Beranda -->
        <div class="tab-content @if (!$errors->any()) active @endif">
            @foreach ($materials as $m)
                <div class="card">
                    <div class="card-header space-between">
                        <h3>{{ $m->MATERIAL_TITLE }}</h3>
                    </div>
                    <div class="card-body">
                        <p>{{ $m->MATERIAL_DESC }}</p>
                    </div>
                    <div class="card-footer space-between">
                        <span><i class="bi bi-calendar-event"></i>12 Februari 2012 at 24:00</span>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Daftar Mahasiswa -->
        <div class="tab-content">
            <div class="card">
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>NRP</th>
                                <th>Nama</th>
                            </tr>
                        <tbody>
                            @foreach ($students as $s)
                                <tr>
                                    <td>{{ $s->STUDENT_ID }}</td>
                                    <td>{{ $s->STUDENT_NAME }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Materi -->
        <div class="tab-content @if ($errors->has('materialtitle') || $errors->has('materialfile') || $errors->has('materialdesc')) active @endif">


            <!-- Materi Modal -->
            <div id="materi_modal" class="modal @if ($errors->has('materialtitle') || $errors->has('materialfile') || $errors->has('materialdesc')) open @endif">
                <form class="card" action="{{ url("teacher/classroom/$course->COURSE_ID/upload/material") }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h1>Tambah Materi</h1>
                    </div>
                    <div class="card-body">
                        <div class="input-group @error('materialtitle') input-danger @enderror">
                            <label for="">Judul Materi</label>
                            <div class="input-text-icon">
                                <input type="text" name="materialtitle" id="" placeholder="Judul Materi">
                            </div>
                            @error('materialtitle')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-group @error('materialfile') input-danger @enderror">
                            <label for="">File</label>
                            <input class="upload-assignment" type="file" id="formFile" name="materialfile">
                            @error('materialfile')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-group @error('materialdesc') input-danger @enderror">
                            <label for="">Deskripsi</label>
                            <div class="input-text-icon">
                                <input type="text" name="materialdesc" id="" placeholder="Deskripsi Materi">
                            </div>
                            @error('materialdesc')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>


                    </div>
                    <div class="card-footer pos-child-right">
                        <button target-modal="materi_modal" type="button"
                            class="button-close-modal bg-danger">Close</button>
                        <button target-modal="materi_modal" type="submit" class="button-close-modal"
                            type="submit">Tambah</button>
                    </div>
                </form>
            </div>

            <button target-modal="materi_modal" class="button-open-modal mb-16 pos-self-right"><i
                    class="bi bi-plus-circle"></i>Tambah Materi</button>
            <!-- End Materi Modal  -->

            <div class="card">
                <div class="card-body">
                    <table class="file-pertemuan-table">
                        <thead>
                            <tr>
                                <th>Pertemuan</th>
                                <th>Nama Materi</th>
                                <th>Deskripsi</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        <tbody>
                            @for ($i = 0; $i < count($materials); $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $materials[$i]->MATERIAL_TITLE }}</td>
                                    <td>{{ $materials[$i]->MATERIAL_DESC }}</td>
                                    <td>
                                        <ul>
                                            @if (count($materials[$i]->MaterialFile) == 1)
                                                <li>
                                                    <a
                                                        href="{{ url("teacher/classroom/$course->COURSE_ID/download/material/" . $materials[$i]->MaterialFile[0]->MATERIAL_FILE_PATH) }}">
                                                        Download Materi
                                                    </a>
                                                </li>
                                            @else
                                                <li>Tidak ada File</li>
                                            @endif
                                        </ul>
                                    </td>
                                    <td><a href="{{ url("teacher/classroom/$course->COURSE_ID/delete/material/" . $m->MATERIAL_ID) }}"><button class="bg-danger" type="button">Delete</button></a></td>

                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tugas -->
        <div class="tab-content">


            <!-- Tugas Modal -->
            <div id="tugas_modal" class="modal">
                <div class="card">
                    <div class="card-header">
                        <h1>Tambah Tugas</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{url("teacher/classroom/$course->COURSE_ID/add/tugas")}}"
                            method="POST" enctype="multipart/form-data">
                            <div class="input-group">
                                <label for="">Judul Tugas</label>
                                <div class="input-text-icon">
                                    <input type="text" name="assignment_title" id="assignment_title" placeholder="Judul Tugas">
                                    @error('assignment_title')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="input-group">
                                <label for="">Deskripsi</label>
                                <div class="input-text-icon">
                                    <input type="text" name="assignment_desc" id="assignment_desc" placeholder="Deskripsi Tugas">
                                    @error('assignment_desc')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="input-group">
                                <label for="">Deadline</label>
                                <div class="input-text-icon">
                                    <input type="date" name="deadline" id="deadline" placeholder="Deadline Tugas">
                                    @error('deadline')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>



                    </div>
                    <div class="card-footer pos-child-right">
                        <button target-modal="tugas_modal" class="button-close-modal bg-danger">Close</button>
                        <button target-modal="tugas_modal" type="submit" class="button-close-modal">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>

            <button target-modal="tugas_modal" class="button-open-modal mb-16 pos-self-right"><i
                    class="bi bi-plus-circle"></i>Tambah Tugas</button>
            <!-- End Materi Modal  -->

            <div class="card">
                <div class="card-body">
                    <table class="file-pertemuan-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tugas</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach ($assign as $a )
                                @if ($course->COURSE_ID == $a->COURSE_ID)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$a->ASSIGNMENT_TITLE}}</td>
                                        <td>{{$a->ASSIGNMENT_DESC}}</td>
                                        <td>
                                            <ul>
                                                <li><a href="{{url("teacher/assignment/$a->ASSIGNMENT_ID")}}">Lihat Detail Tugas</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <!-- Module -->
        <div class="tab-content">
            <div class="card">
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Module</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Banyak Pengumpulan</th>
                                <th>Action</th>
                            </tr>
                        <tbody>
                            @foreach ($assign as $a)
                                @if ($course->COURSE_ID == $a->COURSE_ID)
                                    <tr>
                                        <td class="pos-child-left">{{$a->ASSIGNMENT_TITLE}}</td>
                                        <td>{{$a->DEADLINE}}</td>
                                        @php
                                            $date = new dateTime($a->DEADLINE);
                                            $now = new dateTime();
                                        @endphp
                                        @if ($date < $now)
                                            <td>NON-AKTIF</td>
                                        @else
                                            <td>AKTIF</td>
                                        @endif
                                        <td> 0  / {{ Count($student) }}</td>
                                        <td>
                                            <ul>
                                                <li><a href="{{ url("teacher/assignment/$a->ASSIGNMENT_ID") }}">Lihat Module</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
