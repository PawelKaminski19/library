@extends('layouts/app')

@section('title')
	Lista książek
@endsection

@section('content')
<div class="container">

    <h2>Dodawanie autora</h2>
    <form action="{{ action('AuthorController@store')}}" method="POST" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <div class="form-group">
        <label for="name">Nazwisko</label>
        <input type="text" class="form-control" name="lastname" />
      </div>

      <div class="form-group">
        <label for="name">Imię</label>
        <input type="text" class="form-control" name="firstname" />
      </div>

      <div class="form-group">
        <label for="name">Data urodzenia</label>
        <input type="text" class="form-control" name="birthday" />
      </div>

      <div class="form-group">
        <label for="name">Gatunki</label>
        <input type="text" class="form-control" name="genres" />
      </div>

      <input type="submit" value="Dodaj" class="btn btn-primary"/>
    </form>
</div>
@endsection('content')
