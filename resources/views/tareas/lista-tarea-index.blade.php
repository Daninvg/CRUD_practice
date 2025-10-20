<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
</head>
<body>
    <h1>Lista de tareas</h1><br>
    <ul>
        <li>
            <a href="{{ route('tarea.create')}}">Aqui puedes crear tu tarea.</a>
        </li>
    </ul>
    <table border="1">
        <thead> 
            <tr>
                <th>ID.</th>
                <th>Tarea.</th>
                <th>Descripcion.</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $tarea)
                <tr>
                    <td> {{ $tarea->id }} </td>
                    <td> 
                        <a href="{{ route('tarea.show', $tarea->id) }}">
                            {{ $tarea->titulo }}
                        </a> 
                    </td>
                   <td>
                    <a href="{{ route('tarea.edit', $tarea->id) }}"> Editar </a>
                      <form action=" {route('tarea.destroy', tarea->id)}" method="POST">
                        @csrf
                        @method ('DELETE');
                        <button type="submit"> Eliminar </button>
                      </form>

                   </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    
</body>
</html>