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
    <h3>Account Settings</h3>
    <section class="card-list">

        <article class="card">
          <div class="card-header">
            <h1>Profile Picture Settings</h1>
          </div>
          <div class="card-body">
            <form action="">
              <div class="input-group">
                <label for="">Name</label>
                <div class="input-text-icon">
                  <i class="bi bi-person"></i>
                  <input type="text" name="" id="" placeholder="Name">
                </div>
              </div>

              <button>Save</button>
            </form>


          </div>
        </article>

        <article class="card">
          <div class="card-header">
            <h1>Profile Settings</h1>
          </div>
          <div class="card-body">
            <form action="">
              <div class="input-group">
                <label for="">Name</label>
                <div class="input-text-icon">
                  <i class="bi bi-person"></i>
                  <input type="text" name="" id="" placeholder="Name">
                </div>
              </div>
              <div class="input-group">
                <label for="">Email</label>
                <div class="input-text-icon">
                  <i class="bi bi-at"></i>
                  <input type="email" name="" id="" placeholder="Email">
                </div>
              </div>
              <div class="input-group">
                <label for="">Address</label>
                <div class="input-text-icon">
                  <i class="bi bi-house-gear"></i>
                  <input type="text" name="" id="" placeholder="Address">
                </div>
              </div>
              <div class="input-group">
                <label for="">Phone</label>
                <div class="input-text-icon">
                  <i class="bi bi-phone"></i>
                  <input type="text" name="" id="" placeholder="Phone">
                </div>
              </div>
              <button>Save</button>
            </form>


          </div>
        </article>

        <article class="card">
          <div class="card-header">
            <h1>Statistic</h1>
          </div>
          <div class="card-body">
            <div class="icon-text"><i class="bi bi-journal-check"></i>Rata-rata Nilai : </div>
            <div class="icon-text"><i class="bi bi-book"></i>Total Kelas Diambil :</div>

          </div>
          <div class="card-footer">
            <span class="tag">English</span>
            <span class="tag">Spanish</span>
          </div>
        </article>



      </section>
@endsection
