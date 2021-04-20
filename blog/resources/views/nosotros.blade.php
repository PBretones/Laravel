@extends ('template')

@section ('seccion')

<h1>Nosotros</h1>

@foreach($team as $item)

<a href="{{route('nosotros',$item)}}" class="h4 text-danger">{{$item}}</a>

@endforeach

@if(!empty($team))
<p>La variable existe</p>
@endif

@endsection