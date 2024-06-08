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
        {{-- <button class="tabs-item">Presensi</button> --}}
        <button class="tabs-item">Materi</button>
        <button class="tabs-item">Tugas</button>
        <button class="tabs-item">Module</button>
    </div>


    <div id="class-tabs-content" class="tabs-content-box">


        <!-- Beranda -->
        <div class="tab-content active">
            <div class="card">
                <div class="card-header space-between">
                    <h3>Pertemuan 1 telah selesai</h3>
                    <h4 class="tag bg-success"><i class="bi bi-check"></i>Hadir</h4>
                </div>
                <div class="card-body">
                    <p>Mempelajari cara berkomunikasi dengan Sapi</p>
                </div>
                <div class="card-footer space-between">
                    <div class="flex-row">
                        <img src="assets/img/WP62.png" alt="">
                        <p>Budi Meresapi S.epeda</p>
                    </div>
                    <span><i class="bi bi-calendar-event"></i>12 Februari 2012 at 24:00</span>
                </div>
            </div>
            <div class="card">
                <div class="card-header space-between">
                    <h3>Materi</h3>
                </div>
                <div class="card-body">
                    <p>Tutorial Full ASMR berbicara dengan sapi lokal
                    </p>
                    <ul>
                        <li><a href="">Lihat Detail Materi</a></li>
                        <li><a href="">Download Materi</a></li>
                    </ul>
                </div>
                <div class="card-footer space-between">
                    <div class="flex-row">
                        <img src="{{ asset('assets/img/WP62.png') }}" alt="">
                        <p>Budi Meresapi S.epeda</p>
                    </div>
                    <span><i class="bi bi-calendar-event"></i>12 Februari 2012 at 24:00</span>
                </div>
            </div>
            <div class="card">
                <div class="card-header space-between">
                    <h3>Tugas</h3>
                </div>
                <div class="card-body">
                    <p>Mendengarkan sapi selama 24 jam</p>
                    <ul>
                        <li><a href="">Lihat Detail</a></li>
                    </ul>
                </div>
                <div class="card-footer space-between">
                    <div class="flex-row">
                        <img src="{{ asset('assets/img/WP62.png') }}" alt="">
                        <p>Budi Meresapi S.epeda</p>
                    </div>
                    <span><i class="bi bi-calendar-event"></i>12 Februari 2012 at 24:00</span>
                </div>
            </div>
            <div class="card">
                <div class="card-header space-between">
                    <h3>Pertemuan 1 telah selesai</h3>
                    <h4 class="tag"><i class="bi bi-check"></i>Hadir</h4>
                </div>
                <div class="card-footer space-between">
                    <div class="flex-row">
                        <img src="{{ asset('assets/img/WP62.png') }}" alt="">
                        <p>Budi Meresapi S.epeda</p>
                    </div>
                    <span><i class="bi bi-calendar-event"></i>12 Februari 2012 at 24:00</span>
                </div>
            </div>
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


        <!-- Presensi -->
        {{-- <div class="tab-content">
            <div class="card">
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Pertemuan</th>
                                <th>Topik</th>
                                <th>Rekaman</th>
                                <th>Absensi</th>


                            </tr>
                        <tbody>
                            <tr>
                                <td class="pos-child-center">1</td>
                                <td>Memahami intisari pertemuan 1</td>
                                <td class="pos-child-center">Nihil</td>
                                <td>
                                    <div class="tag pos-self-center"><i class="bi bi-check"></i>Hadir</div>
                                </td>



                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}

        <!-- Materi -->
        <div class="tab-content">

            <div class="card">
                <div class="card-body">
                    <table class="file-pertemuan-table">
                        <thead>
                            <tr>
                                <th>Pertemuan</th>
                                <th>Nama File</th>
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
                                                <li>No file was shared</li>
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


            <!-- Materi Modal -->
            <div id="tugas_modal" class="modal">
                <div class="card">
                    <div class="card-header">
                        <h1>Tambah Tugas</h1>
                    </div>
                    <div class="card-body">
                        <form action="">

                            <div class="input-group">
                                <label for="">Pertemuan</label>
                                <div class="input-text-icon">
                                    <input type="text" name="" id="" placeholder="Username">
                                </div>
                            </div>
                            <div class="input-group">
                                <label for="">Nama File</label>
                                <div class="input-text-icon">
                                    <input type="text" name="" id="" placeholder="Username">
                                </div>
                            </div>
                            <div class="input-group">
                                <label for="">Deskripsi</label>
                                <div class="input-text-icon">
                                    <input type="text" name="" id="" placeholder="Username">
                                </div>
                            </div>

                        </form>

                    </div>
                    <div class="card-footer pos-child-right">
                        <button target-modal="tugas_modal" class="button-close-modal bg-danger">Close</button>
                        <button target-modal="tugas_modal" class="button-close-modal">Tambah</button>
                    </div>
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
                                <th>Pertemuan</th>
                                <th>Nama File</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Ini adalah nama file 1</td>
                                <td>Deksripsi dari file ini adalah dokumen pertemuan 1</td>
                                <td>
                                    <ul>
                                        <li><a href="">Lihat Detail Tugas</a></li>
                                    </ul>
                                </td>
                            </tr>

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
                                <th>Jenis Module</th>
                                <th>Sifat</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Banyak Pengumpulan</th>
                                <th>Action</th>
                            </tr>
                        <tbody>
                            <tr>
                                <td class="pos-child-left">Berbicara dengan Sapi</td>
                                <td>Misi</td>
                                <td>Online</td>
                                <td>12 Februari 2012, 00:00:00 s/d 12 Februari 2012, 24:00:00</td>
                                <td>Berkelompok dengan Sapi</td>
                                <td>1 / 4</td>
                                <td>
                                    <ul>
                                        <li><a href="">Lihat Module</a></li>
                                    </ul>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
