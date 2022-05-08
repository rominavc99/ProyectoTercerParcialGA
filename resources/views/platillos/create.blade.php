<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Platillo</title>
</head>
<body>
    <h1>Crear Nuevo Platillo</h1>
    <a href="{{route('platillos.index')}}">Regresar</a>
    <form method="POST" action="{{route('platillos.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Nombre</label>
            <input type="text" name="nombre" id="nombre">
        </div>
        <div>
            <label>Precio</label>
            <input type="text" name="precio" id="precio">
        </div>
        <div>
            <label>Descripcion</label>
            <textarea name="descripcion" id="descripcion" rows="5"></textarea>
        </div>
        <div>
            <label>Foto</label>
            <input type="file" name="foto" id="foto">
        </div>
        <div>
            <button type="submit">Crear</button>
        </div>
    </form>
</body>
</html>