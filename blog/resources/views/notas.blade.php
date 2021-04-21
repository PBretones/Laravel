<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  @extends ('template')
 

@section ('seccion')

<div class="container my-4">

<h1 class="display-4">Notas</h1>

@if (session('message'))
<div class="alert alert-success">
{{session('message')}}
</div>
@endif
<form  class="py-4" method="POST" action="{{route('notas.crear')}}">

@csrf

@error('name')
<div class="alert alert-danger">Campo name vacío</div>
@enderror

@error('desc')
<div class="alert alert-danger">Campo descripción vacío</div>
@enderror

  <input type="text" placeholder="name" name="name" class="form-control mb-2" value="{{old('name')}}">
  <input type="text" placeholder="descripcion" name="desc" class="form-control mb-2" value="{{old('desc')}}">
  <button class="btn btn-primary form-control" type="submit">Añadir</button>
  </form>
<table class="table table-dark table-striped">

  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripción</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($notas as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>
      <a href="{{route('notas.detalle',$item)}}">{{$item->name}}</a>
      </td>
      <td>{{$item->desc}}</td>
      <td>
      <a href="{{route('notas.editar',$item)}}" class="btn btn-success btn-sm">Editar</a>
      <form action="{{route('notas.delete',$item)}}" method="POST" class="d-inline">
      @method('DELETE')
      @csrf
      <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
      </form></td>
     
    </tr>
    @endforeach()
    </tbody>
</table>
{{$notas->links()}}
</div>

@endsection






    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
     </body>
</html>
