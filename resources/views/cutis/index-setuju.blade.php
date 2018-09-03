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
        <a class="navbar-brand" href="">Pengajuan Cuti</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="">View All</a></li>
        <li><a href="{{ URL::to('cutis/create') }}">Create</a></li>
        <li><a href="{{ URL::to('logout') }}">Logout</a>
    </ul>
</nav>

<h1>All Cutis</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Tanggal Awal Cuti</td>
            <td>Durasi Cuti</td>
            <td>Keperluan Cuti</td>
            <td>Alamat Cuti</td>
            <td>Status</td>
            
        </tr>
    </thead>
    <tbody>
    @foreach($status as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->tgl_awal_cuti }}</td>
            <td>{{ $value->durasi_cuti }}</td>
            <td>{{ $value->keperluan_cuti }}</td>
            <td>{{ $value->alamat_cuti }}</td>
            @if($value->status)
            <td>{{ $value->status }}</td>
            @else
            <td>Pending</td>
            @endif
            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'cutis/destroy/' . $value->id, 'class' => 'pull-right', 'onsubmit' => 'return ConfirmDelete()')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('cutis/show/' . $value->id) }}">Show</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('cutis/edit/' . $value->id) }}">Edit</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>