@extends('layouts.master')

@section('content')
  <div class="row ptb">
    <div class="col-sm-8">
      <h2>Criar compromisso</h2>
    </div>
    <div class="col-sm-4 text-right pt-10">
      <a href="{{ route('appointment.index') }}"> Voltar</a>
    </div>
  </div>

  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Ops!</strong> Ocorreram alguns problemas:<br>
      <ul class="list-unstyled">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {!! Form::open(array('route' => 'appointment.store','method'=>'POST')) !!}
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <strong>Descrição:</strong>
          {!! Form::text('description', null, array('placeholder' => 'Descrição','class' => 'form-control')) !!}
        </div>

        <div class="form-group">
          <strong>Data:</strong>
          {!! Form::date('date', null, array('placeholder' => 'Data','class' => 'form-control')) !!}
        </div>

        <div class="form-group">
          <strong>Hora:</strong>
          {!! Form::text('time', null, array('placeholder' => 'Hora','class' => 'form-control', 'id' => 'time')) !!}
        </div>

        <div class="form-group">
          <strong>Local:</strong>
          {!! Form::select('place_id', $places, null, array('placeholder' => 'Selecione um local','class' => 'form-control')) !!}
        </div>

        <div class="form-group">
          <strong>Pessoas:</strong> <br>
          {!! Form::select('people[]', $people, null, ['multiple' => 'true', 'class' => 'form-control']) !!}
        </div>

        <button type="submit" class="btn btn-success btn-block mt-20">Criar</button>
      </div>
    </div>
  {!! Form::close() !!}

  <script>
  $('#time').mask('00:00');
  </script>
@endsection
