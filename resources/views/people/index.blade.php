@extends('layouts.master')

@section('content')
<div class="row ptb">
  <div class="col-sm-8">
    <h2>Pessoas</h2>
  </div>
  <div class="col-sm-4 text-right">
    <a class="btn btn-success" href="{{ route('people.create') }}">
      <i class="fa fa-plus"></i> Pessoa
    </a>
  </div>
</div>

@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif

<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>Nome Completo</th>
      <th>Telefone</th>
      <th>E-mail</th>
      <th>Ação</th>
    </tr>
  </thead>

  <tbody>
    @foreach($people as $person)
      <tr>
        <td>{{ $person->fullName }}</td>
        <td>{{ $person->phone }}</td>
        <td>{{ $person->email }}</td>

        <td>
          <ul class="list-inline">
            <li>
              <a href="{{ route('people.edit', ['id'=>$person->id]) }}" class="btn btn-sm btn-primary">
                <i class="fa fa-edit"></i>
              </a>
            </li>
            <li>
              {!! Form::open(['method' => 'DELETE','route' => ['people.destroy', $person->id]]) !!}
              <button class="btn btn-sm btn-danger" type="submit">
                <i class="fa fa-trash"></i>
              </button>
              {!! Form::close() !!}
            </li>
          </ul>
        </td>

      </tr>
    @endforeach
  </tbody>
</table>
@endsection
