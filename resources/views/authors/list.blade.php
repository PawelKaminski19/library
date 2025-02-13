@extends('layouts/app')

@section('title')
	Lista książek
@endsection

@section('content')

<div class="container">
	<table class="table">
    <tr>
      <th>Nazwisko autora</th>
      <th>Imię autora</th>
      <th>Data urodzin</th>
      <th>Gatunki</th>
      <th>Książki</th>
    </tr>

	@forelse ($authorsList as $author)
		<tr>
			<td> {{$author->lastname}} </td>
			<td> {{$author->firstname}} </td>
			<td> {{$author->birthday}} </td>
			<td> {{$author->genres}} </td>
      <td>
        @foreach($author->books as $book)
         <a href="{{ url('/books', [$book->id]) }}">{{$book->name}}</a>
        @endforeach
			 </td>
		</tr>
	@empty
		Brak rekordów!
	@endforelse
	</table>
</div>
@endsection('content')
