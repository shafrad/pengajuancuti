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
        <a class="navbar-brand" href="{{ URL::to('hotels') }}">Hotels</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('hotels') }}">View All Hotels</a></li>
        <li><a href="{{ URL::to('hotels/create') }}">Create a Hotel</a>
    </ul>
</nav>

<h1>Showing {{ $hotel->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $hotel->name }}</h2>
        <p>
            <strong>City:</strong> {{ $hotel->city }}<br>
            <strong>Address:</strong> {{ $hotel->address }}<br>
            <strong>Country:</strong> {{ $hotel->country }}<br>
            <strong>Phone:</strong> {{ $hotel->phone }}<br>
            <strong>Email:</strong> {{ $hotel->email }}<br>
            <strong>Website:</strong> {{ $hotel->website }}<br>
            <strong>Latitude:</strong> {{ $hotel->latitude }}<br>
            <strong>Longitude:</strong> {{ $hotel->longitude }}
        </p>
    </div>

</div>
</body>
</html>