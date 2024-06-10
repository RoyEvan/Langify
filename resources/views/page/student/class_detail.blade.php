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
            <p><i class="bi bi-people"></i>{{ count($course->Student) }} People</p>
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
        <div class="tab-content active">
        @php
        use Carbon\Carbon;
        use Illuminate\Support\Str;
        Carbon::setLocale('en');
        @endphp

            @foreach($combined as $c)
            <div class="card">
                <div class="card-header space-between">
                    <h3>{{ $c->ASSIGNMENT_TITLE }}</h3>
                    {{-- pengecekan kalo ada week pada desc berarti materi --}}
                    @if ($c->DEADLINE == null)
                        <h4 class="tag bg-success"><i class="bi bi-book"></i>Materi</h4>
                    @else
                        <h4 class="tag bg-success"><i class="bi bi-journal-code"></i>Tugas</h4>
                    @endif
                </div>
                <div class="card-body">
                    <p>{{ $c->ASSIGNMENT_DESC }}</p>
                    @if ($c->DEADLINE == null)
                        {{-- materi file --}}
                        <ul>
                            @php
                                $file = App\Models\Material::find($c->ASSIGNMENT_ID)->MaterialFile;
                            @endphp
                            @if (count($file) == 1)
                                <li><a href="{{ url("student/classroom/$c->COURSE_ID/download/material/" . $file[0]->MATERIAL_FILE_PATH ) }}">Download Materi</a></li>
                            @endif
                        </ul>
                    @else
                        {{-- assignment --}}
                        <ul>
                            <li><a href="{{ url("student/assignment/$c->ASSIGNMENT_ID") }}">Lihat Detail</a></li>
                        </ul>
                    @endif
                <div class="card-footer space-between">
                    <div class="flex-row">
                        <img src="assets/img/WP62.png" alt="">
                        {{-- <p>Budi Meresapi S.epeda</p> --}}
                    </div>
                    <span><i class="bi bi-calendar-event"></i>{{ Carbon::parse($c->CREATED_AT)->translatedFormat('d F Y \a\t H:i') }}</span>
                </div>
            </div>
            @endforeach
            <br>
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
                            @foreach ($course->Student as $s)
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
        <div class="tab-content">

            <div class="card">
                <div class="card-body">
                    <table class="file-pertemuan-table">
                        <thead>
                            <tr>
                                <th>Pertemuan</th>
                                <th>Nama Materi</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        <tbody>
                            @for ($i = 0; $i < count($materials); $i++)
                                <tr>
                                    <td>{{ 1 + $i }}</td>
                                    <td>{{ $materials[$i]->MATERIAL_TITLE }}</td>
                                    <td>{{ $materials[$i]->MATERIAL_DESC }}</td>
                                    <td>
                                        <ul>
                                            @if (count($materials[$i]->MaterialFile) == 1)
                                                <li>
                                                    <a
                                                        href="{{ url("student/classroom/$course->COURSE_ID/download/material/" . $materials[$i]->MaterialFile[0]->MATERIAL_FILE_PATH) }}">
                                                        Download Materi
                                                    </a>
                                                </li>
                                            @else
                                                <li>Tidak ada file</li>
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tugas -->
        <div class="tab-content">
            <div class="card">
                <div class="card-body">
                    <table class="file-pertemuan-table">
                        <thead>
                            <tr>
                                <th>Pertemuan</th>
                                <th>Nama Tugas</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @foreach ($assign as $a)
                                @if ($course->COURSE_ID == $a->COURSE_ID)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$a->ASSIGNMENT_TITLE}}</td>
                                        <td>{{$a->ASSIGNMENT_DESC}}</td>
                                        <td>
                                            <ul>
                                                <li><a href="{{url("student/assignment/$a->ASSIGNMENT_ID")}}">Lihat Detail Tugas</a></li>
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
                                {{-- <th>Jenis Module</th>
                                <th>Sifat</th> --}}
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
                                        {{-- <td>Misi</td> --}}
                                        {{-- <td>Online</td> --}}
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
                                        <td> 0  / {{ Count($course->Student) }}</td>
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
