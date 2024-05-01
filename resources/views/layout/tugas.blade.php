@extends('main')

@section('tab-title')
	Assignments
@endsection

@section('cdn-links')
    <link rel="stylesheet" href="assets/css/tugas.css">

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
			<h2>Bahasa Sapi</h2>
			<p>Profesional Program of Moology</p>
		</div>
		<div class="card-footer">
			<p><i class="bi bi-people"></i>4 People</p>
			<p><i class="bi bi-person-video3"></i>Budi Meresapi S.epeda</p>
			<p><i class="bi bi-geo-alt"></i>X-001</p>
			<p><i class="bi bi-calendar-event"></i>Senin</p>
			<p><i class="bi bi-clock"></i>24.00</p>
		</div>
	</header>

	<div class="alert-box">
		<div class="alert">
			<h3>Waktu tersisa 3 jam lagi</h3>
			<p>Segera kumpulkan Tugas anda!</p>
		</div>
	</div>

	<div class="assignment-submit-box">
		<div class="assignment-action">
			<input class="upload-assignment" type="file" id="formFile">
			<label for="formFile"><button>Submit</button></label>
		</div>
		<div class="assignment-status">
			<b>Nilai : </b>
			<!-- <span> Belum Mengumpulkan!</span> -->
			<!-- <i class="bi bi-x-circle"></i> -->
			<span> 90/100</span>
			<i class="bi bi-check-circle"></i>
		</div>
	</div>

	<article class="card assignment-description">
		<div class="card-header">
			<h3>Informasi Module</h3>
		</div>
		<div class="card-body">
			<table>
				<tbody>
					<tr>
						<td>Nama Module</td>
						<td>Berkomunikasi dengan sapi</td>
					</tr>
					<tr>
						<td>Jenis Module</td>
						<td>MISI</td>
					</tr>
					<tr>
						<td>Deadline</td>
						<td>12 Feb 2012 s/d 12 Feb 2012 24.00</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>Berbicaralah dengan sapi lokal selama 3 jam 14 menit</td>
					</tr>
					<tr>
						<td>Sifat Pengumpulan</td>
						<td>Online</td>
					</tr>
					<tr>
						<td>Sifat Module</td>
						<td>Berkelompok dengan sapi</td>
					</tr>
					<tr>
						<td>Jenis File Module</td>
						<td>mp4</td>
					</tr>
					<tr>
						<td>Status Module</td>
						<td>Aktif</td>
					</tr>
					<tr>
						<td>Total Module Terkumpul</td>
						<td>0 / 4</td>
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
						<th>Waktu Kumpul</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>123456789</td>
						<td>Udin Border Solid</td>
						<td>-</td>
					</tr>
					<tr>
						<td>2</td>
						<td>123456789</td>
						<td>Udin Border Solid</td>
						<td>-</td>
					</tr>
					<tr class="bg-success">
						<td>3</td>
						<td>123456789</td>
						<td>Udin Border Solid</td>
						<td>12 February 2012 24:00:00</td>
					</tr>
					<tr>
						<td>4</td>
						<td>123456789</td>
						<td>Udin Border Solid</td>
						<td>-</td>
					</tr>


				</tbody>
			</table>
		</div>
	</div>
@endsection
