<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('cutis') }}">Pengajuan Cuti</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('cutis') }}">View All</a></li>
        <li><a href="{{ URL::to('cutis/create') }}">Create</a></li>
        <li><a href="{{ URL::to('logout') }}">Logout</a></li>
    </ul>
</nav>

<h1>Showing {{ $hotel->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $hotel->name }}</h2>
        <p>
            <strong>Tanggal Awal Cuti:</strong> {{ $hotel->tgl_awal_cuti }}<br>
            <strong>Durasi Cuti:</strong>Address:</strong> {{ $hotel->durasi_cuti }}<br>
            <strong>Keperluan Cuti:</strong> {{ $hotel->keperluan_cuti }}<br>
            <strong>Alamat Cuti:</strong> {{ $hotel->alamat_cuti }}
        </p>
    </div>

</div>
</body>
</html>