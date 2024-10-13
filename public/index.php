@extends('layout')
<h1>Contactos</h1>

@section('contenido')
<h1>Todos los mensajes</h1>
<table class="table">
<thead>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Email</th>
<th>Mensaje</th>

</tr>
</thead>
<tbody>
@foreach ($messages as $message)
<tr>
<td>
<a href="{{route('messages.show',$message->id)}}">
{{ $message->id }}</a></td>
<td>{{ $message->nombre }}</td>
<td>{{ $message->email }}</td>
<td>{{ $message->mensaje }}</td>
<td>
<a class="btn btn-info btn-xs" href="{{ route('messages.edit', $message->id) }}">Editar</a>
<form style="display:inline" method="POST" action="{{ route('messages.destroy', $message->id) }}">
{!! csrf_field() !!}
{!! method_field('DELETE') !!}

<button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
</form>
</td>
</tr>
@endforeach
<!--!! $messages->fragment('hash')->appends(request()->query())->links('pagination::default') !!--> </tbody>
</table>
@stop