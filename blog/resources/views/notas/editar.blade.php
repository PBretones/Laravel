@extends('template')

@section('seccion')
<h1>Editar nota {{$notas->id}}</h1>

@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
<form  method="POST" action="{{route('notas.update',$notas->id)}}">
@method('PUT')
@csrf
@error('name')
<div class="alert alert-danger">Campo name vacío</div>
@enderror
@error('desc')
<div class="alert alert-danger">Campo descripción vacío</div>
@enderror
  <input type="text" placeholder="name" name="name" class="form-control mb-2" value="{{$notas->name}}">
  <input type="text" placeholder="descripcion" name="desc" class="form-control mb-2" value="{{$notas->desc}}">
  <button class="btn btn-success form-control" type="submit">Editar</button>
  </form>
@endsection