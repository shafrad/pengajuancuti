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
        <li><a href="{{ URL::to('logout') }}">Logout</a>        
    </ul>
</nav>

<h1>Create Pengajuan Cuti</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'cutis/store')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('tgl_awal_cuti', 'Tanggal Awal Cuti') }}
        {{ Form::text('tgl_awal_cuti', Input::old('tgl_awal_cuti'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('durasi_cuti', 'Durasi Cuti') }}
        {{ Form::text('durasi_cuti', Input::old('durasi_cuti'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('keperluan_cuti', 'Keperluan Cuti') }}
        {{ Form::text('keperluan_cuti', Input::old('keperluan_cuti'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('alamat_cuti', 'Alamat Cuti') }}
        {{ Form::text('alamat_cuti', Input::old('alamat_cuti'), array('class' => 'form-control')) }}
    </div>

    <!-- <div class="form-group">
        {{ Form::label('nerd_level', 'Nerd Level') }}
        {{ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('nerd_level'), array('class' => 'form-control')) }}
    </div> -->

    {{ Form::submit('Ajukan', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
