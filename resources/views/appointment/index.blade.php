@extends('layouts.master')

@section('content')
  <div class="row ptb">
    <div class="col-sm-8">
      <h2>Agenda</h2>
    </div>
    <div class="col-sm-4 text-right">
      <a class="btn btn-success" href="{{ route('appointment.create') }}">
        <i class="fa fa-plus"></i> Compromisso
      </a>
    </div>
  </div>

  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif

  <div class="row">
    @foreach ($appointments as $key => $appointment)
      <div class="col-sm-12 card">
        <div class="row">
          <div class="col-sm-3">
            <strong>Descrição</strong> <br>
            {{ $appointment->description }} <br>
            <strong>Data</strong> <br>
            {{  Carbon\Carbon::parse($appointment->date)->format('d/m/Y')  }} às {{$appointment->time}}
          </div>
          <div class="col-sm-3">
            <strong>Pessoas</strong> <br>
            @foreach ($appointment->people as $key => $person)
              {{ $person->fullName }} <br>
            @endforeach
          </div>
          <div class="col-sm-4">
            <strong>Local</strong> <br>
            Bairro {{ $appointment->place->neighborhood }} <br>
            {{ $appointment->place->street }}, {{ $appointment->place->number }}<br>
          </div>
          <div class="col-sm-2 text-right">
            <ul class="list-inline">
              <li>
                <a class="btn btn-primary btn-sm" href="{{ route('appointment.edit',$appointment->id) }}">
                  <i class="fa fa-edit"></i>
                </a>
              </li>
              <li>
                {!! Form::open(['method' => 'DELETE','route' => ['appointment.destroy', $appointment->id]]) !!}
                <button class="btn btn-sm btn-danger" type="submit">
                  <i class="fa fa-trash"></i>
                </button>
                {!! Form::close() !!}
              </li>
            </ul>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
