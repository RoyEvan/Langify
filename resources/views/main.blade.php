<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="An Langify Website">
	<title>@yield('tab-title')</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('assets/icon/globe2.svg') }}">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" as="style">

	@yield('cdn-links')
</head>

<body>

	<header class="topbar">
		<button onclick=toggleSidebar() id="sidebartoggle"><i class="bi bi-list"></i></button>
		<h1><i class="bi bi-globe2"></i>Langify</h1>
	</header>


	<!-- Sidebar closed helper for mobile -->
	<nav class="sidebar closed">
		<h1><i class="bi bi-globe2"></i>Langify</h1>
		<ol>
			<li class="active"><a href="index.html"><i class="bi bi-house"></i>Home</a></li>
			<li><a href="kelas.html"><i class="bi bi-book"></i>Kelas</a></li>
			<li><a href="tugas.html"><i class="bi bi-journal-bookmark"></i>Tugas Kuliah</a></li>
			<li><a href="detailKelas.html"><i class="bi bi-clipboard-data"></i>Detail Kelas</a></li>
			<li><a href="login.html"><i class="bi bi-door-open"></i>Sign Out</a></li>
		</ol>
		<div class="account-box">
			<img src="assets/img/2532369.jpg" alt="" loading="lazy">
			<div class="account-details">
				<p>Sugeng Display None</p>
				<span>123456789</span>
			</div>
		</div>
	</nav>

	<div class="content">
		<div class="notification">
			<span>Ini Adalah notifikasi penting!</span>
			<div class="dynamic-action">
				<button aria-label="Close Notification"><i class="bi bi-x-lg"></i></button>
			</div>
		</div>

		<main>
			@yield('content')
		</main>


		<footer>Copyright Langify</footer>
	</div>



	<script src="{{ asset('assets/js/index.js') }}"></script>
</body>

</html>