@extends('template')

@section('seccion')

<h1>Detalle de nota:</h1>
<h4>Id: {{$notas->id}}</h4>
<h4>Nombre: {{$notas->name}}</h4>
<h4>Detalle: {{$notas->desc}}</h4>

@endsection