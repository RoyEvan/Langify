@extends('layout/main')


@section('tab-title')
    Assignments
@endsection

@section('cdn-links')
    <link rel="stylesheet" href="{{ asset('assets/css/tugas.css') }}">


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
            <h2>{{ $assign->Course->COURSE_NAME }}</h2>
            <p>{{ $assign->Course->COURSE_DESC }}</p>
        </div>
        <div class="card-footer">
            <p><i class="bi bi-people"></i>{{ Count($student) }} People</p>

            <p><i class="bi bi-person-video3"></i>{{ $teacher->TEACHER_NAME }}</p>
            <p><i class="bi bi-geo-alt"></i>{{ $assign->Course->COURSE_CLASS }}</p>
            <p><i class="bi bi-calendar-event"></i>{{ $assign->Course->COURSE_DAY }}</p>
            <p><i class="bi bi-clock"></i>{{ $assign->Course->COURSE_LENGTH }} Hours</p>
        </div>
    </header>

    <article class="card assignment-description">
        <div class="card-header">
            <h3>Informasi Module</h3>
        </div>
        <div class="card-body">
            <table>
                <tbody>
                    <tr>
                        <td>Nama Module</td>
                        <td>{{ $assign->ASSIGNMENT_TITLE }}</td>
                    </tr>
                    <tr>
                        <td>Deadline</td>
                        <td>{{ $assign->DEADLINE }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>{{ $assign->ASSIGNMENT_DESC }}</td>
                    </tr>

                    <tr>
                        <td>Total Module Terkumpul</td>
                        <td>{{ count($studentDone ?? []) }} / {{ Count($student) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </article>

    <div class="assignment-data card">
        <div class="card-header">
            <h3>Data Terkumpul</h3>
        </div>
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Nilai</th>
                        <th>Waktu Kumpul</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($student as $s)
                        @php
                            $done = false;
                            $doneDate = '-';
                        @endphp
                        @foreach ($studentDone as $sd)
                            @if ($s->STUDENT_ID == $sd->STUDENT_ID)
                                @php
                                    $done = true;
                                    $doneDate = $sd->pivot->CREATED_AT;
                                    break; // Exit the inner loop since we found a match
                                @endphp
                            @endif
                        @endforeach
                        <tr class="{{ $done ? 'bg-success' : '' }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->STUDENT_ID }}</td>
                            <td>{{ $s->STUDENT_NAME }}</td>
                            <td>
                                @php
                                    $scoreData = $s->Assignment()->wherePivot("ASSIGNMENT_ID", '=', $assign->ASSIGNMENT_ID)->first();
                                @endphp
                                @if ($scoreData)
                                    {{ $scoreData->pivot->SCORE }}
                                @endif
                            </td>
                            <td>{{ $doneDate }}</td>
                            <td>
                                @if ($s->Assignment->find($assign->ASSIGNMENT_ID))
                                    <div class="icon-text">
                                        <i class="bi bi-download"></i>
                                        <a
                                            href="{{ url("teacher/classroom/" . $assign->Course->COURSE_ID . "/download/assignment/$assign->ASSIGNMENT_ID/$s->STUDENT_ID") }}">
                                            Tugas Siswa
                                        </a>
                                    </div>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($done)
                                    <!-- Materi Modal -->
                                    <div id="nilai_modal_{{ $s->STUDENT_ID }}" class="modal">
                                        <form class="card" action="{{ url("teacher/assignment/$assign->ASSIGNMENT_ID/grade") }}" method="post">
                                            @csrf
                                            <div class="card-header">
                                                <h1>Beri Nilai</h1>
                                            </div>
                                            <div class="card-body">
                                                <div class="input-group @error('score') input-danger @enderror">
                                                    <label for="">Nilai</label>
                                                    <div class="input-text-icon">
                                                        <input type="hidden" name="sid" value="{{ $s->STUDENT_ID }}">
                                                        <input type="number" name="score" placeholder="Nilai">
                                                    </div>
                                                    @error('score')
                                                        <p>{{ $message }}</p>
                                                    @enderror
                                                    @error('student_id')
                                                        <p>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="card-footer pos-child-right">
                                                <button target-modal="nilai_modal" type="button"
                                                    class="button-close-modal bg-danger">Close</button>
                                                <button target-modal="nilai_modal" type="submit" id="{{ $s->STUDENT_ID }}" class="button-close-modal"
                                                    type="submit">Beri Nilai</button>
                                            </div>
                                        </form>
                                    </div>

                                    <button target-modal="nilai_modal_{{ $s->STUDENT_ID }}" class="button-open-modal mb-16 pos-self-right">
                                        <i class="bi bi-pencil"></i>Nilai
                                    </button>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
