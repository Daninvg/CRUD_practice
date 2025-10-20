<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarea: Crear</title>
</head>
<body>
    <h1>Creación de nueva tarea</h1>

    @include('formulario-error')

    <form action="{{ route('tarea.store') }}" method="POST">
        @csrf
        <label for="titulo">Titulo:</label>
        <input
            type="text"
            id="titulo"
            name="titulo"
            value="{{ old('titulo') }}"
            >
     
        <br>
        <label for="descripcion">Descripcion:</label>
        <textarea id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
   
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>