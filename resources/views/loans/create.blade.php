@extends('layouts/app')

@section('title')
	Lista książek
@endsection

@section('content')
<div class="container">

    <h2>Dodawanie wypożyczenia</h2>
    <form action="{{ action('LoanController@store')}}" method="POST" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <div class="form-group">
        <label for="name">Tytuł książki</label>
        <select type="text" class="form-control" name="book_id">
          @foreach ($books as $book)
            <option value="{{ $book->id }}">{{ $book->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="name">Dane wypożyczającego</label>
        <input type="text" class="form-control" name="client" />
      </div>

      <div class="form-group">
        <label for="name">Data wypożyczenia</label>
        <input type="text" class="form-control" name="loaned_on" />
      </div>


      <div class="form-group">
        <label for="name">Przewidywany zwrot</label>
        <input type="text" class="form-control" name="estimated_on" />
      </div>


      <input type="submit" value="Dodaj" class="btn btn-primary"/>
    </form>
</div>
@endsection('content')
