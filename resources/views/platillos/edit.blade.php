<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Platillo</title>
</head>
<body>
    <h1>Editar Platillo</h1>
    <a href="{{route('platillos.index')}}">Regresar</a>
    <form method="POST" action="{{route('platillos.update', $platillo->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label>Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{$platillo->nombre}}">
        </div>
        <div>
            <label>Precio</label>
            <input type="text" name="precio" id="precio" value="{{$platillo->precio}}">
        </div>
        <div>
        <div>
            <label>Descripcion</label>
            <textarea name="descripcion" id="descripcion" rows="5" value="{{$platillo->descripcion}}"></textarea>
        </div>
        <div>
            <label>Foto</label>
            <input type="file" name="foto" id="foto" value="{{$platillo->foto}}">
        </div>
        <div>
            <button type="submit">Actualizar</button>
        </div>
    </form>
</body>
</html>