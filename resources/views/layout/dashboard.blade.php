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
	<section>
		<h1>asdasddssadsdas</h1>
		<h1>asdasddssadsdas</h1>
		<h1>asdasddssadsdas</h1>
		<h1>asdasddssadsdas</h1>
		<h1>asdasddssadsdas</h1>
		<div class="card header-card-list">
			<i class="bi bi-exclamation-triangle"></i>
			<h3>Deadline Aktif</h3>
			<div class="badge">
				<span>3</span>
				Jam lagi
			</div>
		</div>

		<section class="scroll-card-list">
			<article class="card">
				<div class="card-header">
					<span class="tag">Misi</span>
					<h3>Bahasa Sapi</h3>
				</div>
				<div class="card-body">
					<h2>Misi Berkomunikasi</h2>
					<p class="desc-3-lines">Berbicara dengan Sapi lokal selama 3 jam 14 menit tanpa berkedip atau menoleh
					</p>
					<div class="icon-text"><i class="bi bi-calendar2-event"></i>Pertemuan ke 432</div>
					<div class="icon-text"><i class="bi bi-clock"></i>Senin, 12 Februari 2012 | 24:00</div>
					<div class="icon-text"><i class="bi bi-folder2-open"></i><a href="">lihat detail tugas</a>
					</div>
				</div>
				<div class="card-footer">
					<span class="tag">mp4</span>
					<span class="tag">Berkelompok dengan Sapi</span>
				</div>
			</article>
		</section>
	</section>


	<section>

		<div class="card header-card-list">
			<i class="bi bi-pencil"></i>
			<h3>Module Aktif</h3>
		</div>




		<section class="scroll-card-list">

			<article class="card">
				<div class="card-header">
					<span class="tag">Misi</span>
					<h3>Bahasa Sapi</h3>
				</div>
				<div class="card-body">
					<h2>Misi Berkomunikasi</h2>
					<p class="desc-3-lines">Berbicara dengan Sapi lokal selama 3 jam 14 menit tanpa berkedip atau
									menoleh</p>
					<div class="icon-text"><i class="bi bi-calendar2-event"></i>Pertemuan ke 432</div>
					<div class="icon-text"><i class="bi bi-clock"></i>Senin, 12 Februari 2012 | 24:00</div>
					<div class="icon-text"><i class="bi bi-folder2-open"></i><a href="">lihat detail tugas</a>
					</div>
				</div>
				<div class="card-footer">
					<span class="tag">mp4</span>
					<span class="tag">Berkelompok dengan Sapi</span>
				</div>
			</article>

			<article class="card">
				<div class="card-header">
					<span class="tag">Misi</span>
					<h3>Bahasa Sapi</h3>
				</div>
				<div class="card-body">
					<h2>Misi Mendengar</h2>
					<p class="desc-3-lines">Mendengarkan Sapi lokal selama 3 jam 14 menit tanpa berkedip atau menoleh
					</p>
					<div class="icon-text"><i class="bi bi-calendar2-event"></i>Pertemuan ke 432</div>
					<div class="icon-text"><i class="bi bi-clock"></i>Senin, 12 Februari 2012 | 24:00</div>
					<div class="icon-text"><i class="bi bi-folder2-open"></i><a href="">lihat detail tugas</a>
					</div>
				</div>
				<div class="card-footer">
					<span class="tag">mp4</span>
					<span class="tag">Berkelompok dengan Sapi</span>
				</div>
			</article>

		</section>
	</section>


	<section>
		<div class="card header-card-list">
			<i class="bi bi-journal-code"></i>
			<h3>Materi Terbaru</h3>
		</div>


		<section class="scroll-card-list">

			<article class="card">
				<div class="card-header">
					<span class="tag">Bhs. Sapi</span>
					<h3>Pertemuan 432</h3>
				</div>
				<div class="card-body">
					<h2>Tutorial Mendengar</h2>
					<p class="desc-3-lines">Full 400 jam ASMR suara Sapi membaca pidato</p>
				</div>
				<div class="card-footer">
					<div class="icon-text"><i class="bi bi-download"></i><a href="">Download File (mp3)</a></div>
				</div>
			</article>


		</section>
	</section>
@endsection