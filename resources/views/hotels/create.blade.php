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

<h1>Create a Hotel</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'hotels')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('city', 'City') }}
        {{ Form::text('city', Input::old('city'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', Input::old('address'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('country', 'Country') }}
        {{ Form::text('country', Input::old('country'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Phone') }}
        {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('website', 'Website') }}
        {{ Form::text('website', Input::old('website'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('latitude', 'Latitude') }}
        {{ Form::text('latitude', Input::old('latitude'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('longitude', 'Longitude') }}
        {{ Form::text('longitude', Input::old('longitude'), array('class' => 'form-control')) }}
    </div>

    <!-- <div class="form-group">
        {{ Form::label('nerd_level', 'Nerd Level') }}
        {{ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('nerd_level'), array('class' => 'form-control')) }}
    </div> -->

    {{ Form::submit('Create the Hotel!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
