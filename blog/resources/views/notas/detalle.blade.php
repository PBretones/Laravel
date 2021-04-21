@extends('template')

@section('seccion')
<div class="card my-4 bg-dark text-white text-center">
<div class="card-body">
<h1 class="card-title">Detalle de nota</h1>
<h4 class="card-text">Id: {{$notas->id}}</h4>
<h4 class="card-text">Nombre: {{$notas->name}}</h4>
<h4 class="card-text">Detalle: {{$notas->desc}}</h4>
</div>
</div>

@endsection