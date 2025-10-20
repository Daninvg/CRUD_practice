<?php

use App\Models\Tarea;

uses(\Illuminate\Foundation\Testing\RefreshDatabaseState::class);

test('muestra listado de tareas', function(){
    $tarea = Tarea::factory()->create();

    $this->get(route('tarea.lista-tarea.index'))
         ->assertSeeInOrder(['Tarea', 'Acciiones'])
         ->assertSee($tarea->titulo)
         ->assertStatus(200);

});

