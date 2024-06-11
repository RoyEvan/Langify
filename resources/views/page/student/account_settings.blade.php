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
    <h3>Account Settings</h3>
    <section class="card-list">

        <div class="card-list">

            <article class="card">

                <div class="card-header">
                    <h1>Profile</h1>
                </div>
                <div class="card-body">
                    <div class="flex-row">Your now login as : <span class="tag">Student</span></div>
                </div>

            </article>
            <article class="card">

                <div class="card-header">
                    <h1>Delete Account</h1>
                </div>
                <div class="card-body">

                    <div class="icon-text danger"><i class="bi bi-exclamation-triangle"></i>
                        Your email address is no longer available for reuse or registration!
                    </div>
                    <div class="icon-text danger"><i class="bi bi-exclamation-triangle"></i>
                        This action cannot be reversed!
                    </div>
                </div>
                <div class="card-footer">
                    <a href="account_settings/delete"><button class="bg-danger">Delete Account</button></a>
                </div>

            </article>
        </div>


        <article class="card">
            <div class="card-header">
                <h1>Profile Settings</h1>
            </div>
            <div class="card-body">
                <form action="{{ url('student/account_settings/update') }}" action="POST">
                    <div class="input-group @error('STUDENT_NAME') input-danger @enderror">
                        <label for="">Name</label>
                        <div class="input-text-icon">
                            <i class="bi bi-person"></i>
                            <input type="text" name="STUDENT_NAME" id="" placeholder="Name"
                                value="{{ $accountData->globalname }}">
                        </div>
                        @error('STUDENT_NAME')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-group @error('STUDENT_EMAIL') input-danger @enderror">
                        <label for="">Email</label>
                        <div class="input-text-icon">
                            <i class="bi bi-at"></i>
                            <input type="email" name="STUDENT_EMAIL" id="" placeholder="Email"
                                value="{{ $accountData->globalemail }}">
                        </div>
                        @error('STUDENT_EMAIL')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-group @error('STUDENT_ADDRESS') input-danger @enderror">
                        <label for="">Address</label>
                        <div class="input-text-icon">
                            <i class="bi bi-house-gear"></i>
                            <input type="text" name="STUDENT_ADDRESS" id="" placeholder="Address"
                                value="{{ $accountData->STUDENT_ADDRESS }}">
                        </div>
                        @error('STUDENT_ADDRESS')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-group @error('STUDENT_PHONE') input-danger @enderror">
                        <label for="">Phone</label>
                        <div class="input-text-icon">
                            <i class="bi bi-phone"></i>
                            <input type="text" name="STUDENT_PHONE" id="" placeholder="Phone"
                                value="{{ $accountData->STUDENT_PHONE }}">
                        </div>
                        @error('STUDENT_PHONE')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit">Save</button>
                </form>


            </div>
        </article>

        <div class="card-list">

            <article class="card">
                <div class="card-header">
                    <h1>Statistic</h1>
                </div>
                <div class="card-body">
                    <div class="icon-text"><i class="bi bi-book"></i>Total Kelas Diambil : {{ count($courseTaken) }}</div>

                </div>
                <div class="card-footer">
                    @forelse ($courseTaken as $c)
                        <span class="tag">{{ $c->COURSE_NAME }} &bull; {{ $c->COURSE_LEVEL }}</span>
                    @empty
                        <span class="tag">You're not in a class yet!</span>
                    @endforelse ()
                </div>
            </article>

            <article class="card">
                <div class="card-header">
                    <h1>Join a Class</h1>
                </div>
                <div class="card-body">
                    <form action="{{ url('student/account_settings/join_class') }}" method="POST">
                        @csrf
                        <div class="input-group  @error('COURSE_ID') input-danger @enderror">
                            <label for="">Class Code</label>
                            <div class="input-text-icon">
                                <i class="bi bi-hash"></i>
                                <input type="text" name="COURSE_ID" id="" placeholder="Code" value="">
                            </div>
                            @error('COURSE_ID')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <button>Join</button>
                    </form>

                </div>

            </article>

            <article class="card">
                <div class="card-header">
                    <h1>Become A Teacher</h1>
                </div>
                <div class="card-body">
                    <form action="account_settings/become_teacher" method="POST">
                        @csrf
                        <div class="input-group @error('ACCESS_CODE') input-danger @enderror">
                            <label for="">Access Code</label>
                            <div class="input-text-icon">
                                <i class="bi bi-hash"></i>
                                <input type="password" name="ACCESS_CODE" id="" placeholder="Access Code"
                                    value="">
                            </div>
                            @error('ACCESS_CODE')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit">Be a Teacher</button>
                    </form>

                </div>

            </article>

        </div>





    </section>
@endsection
