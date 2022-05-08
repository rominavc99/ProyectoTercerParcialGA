<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
</head>
<body>
    <h1>Lista de Platillos</h1>
    @if(Session::has('exito'))
        <p>{{Session::get('exito')}}</p>
    @endif
    @if(Session::has('error'))
        <p>{{Session::get('error')}}</p>
    @endif
    <a href="{{route('platillos.create')}}">Crear Platillo</a>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($platillos as $platillo)
                <tr>
                    <td>{{$platillo->nombre}}</td>
                    <td>{{$platillo->precio}}</td>
                    <td>{{$platillo->descripcion}}</td>
                    <td>
                        <form method="post" action="{{ route('platillos.destroy', $platillo->id) }}">
                            @csrf
                            @method('delete')
                            <a href="{{ route('platillos.edit', $platillo->id) }}">Editar</a>
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>