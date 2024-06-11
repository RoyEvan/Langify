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
                    <div class="flex-row">Your now login as : <span class="tag">Teacher</span></div>
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
                <form action="{{ url('teacher/account_settings/update') }}" action="POST">
                    <div class="input-group @error('TEACHER_NAME') input-danger @enderror">
                        <label for="">Name</label>
                        <div class="input-text-icon">
                            <i class="bi bi-person"></i>
                            <input type="text" name="TEACHER_NAME" id="" placeholder="Name"
                                value="{{ $accountData->globalname }}">
                        </div>
                        @error('TEACHER_NAME')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-group @error('TEACHER_EMAIL') input-danger @enderror">
                        <label for="">Email</label>
                        <div class="input-text-icon">
                            <i class="bi bi-at"></i>
                            <input type="email" name="TEACHER_EMAIL" id="" placeholder="Email"
                                value="{{ $accountData->globalemail }}">
                        </div>
                        @error('TEACHER_EMAIL')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-group @error('TEACHER_ADDRESS') input-danger @enderror">
                        <label for="">Address</label>
                        <div class="input-text-icon">
                            <i class="bi bi-house-gear"></i>
                            <input type="text" name="TEACHER_ADDRESS" id="" placeholder="Address"
                                value="{{ $accountData->TEACHER_ADDRESS }}">
                        </div>
                        @error('TEACHER_ADDRESS')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-group @error('TEACHER_PHONE') input-danger @enderror">
                        <label for="">Phone</label>
                        <div class="input-text-icon">
                            <i class="bi bi-phone"></i>
                            <input type="text" name="TEACHER_PHONE" id="" placeholder="Phone"
                                value="{{ $accountData->TEACHER_PHONE }}">
                        </div>
                        @error('TEACHER_PHONE')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit">Save</button>
                </form>


            </div>
        </article>

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



    </section>
@endsection
