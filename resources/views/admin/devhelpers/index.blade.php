@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Cognome</th>
            <th scope="col">Email</th>
            <th scope="col">Github</th>
            <th scope="col">Telefono</th>
            <th scope="col">Indirizzo</th>
            <th scope="col">Skills</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
          <tr>         
            <td>{{ $item->name }}</td>
            <td>{{ $item->surname }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->github }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->skills }}</td>
        </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection