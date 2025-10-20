<?php

use App\Models\Tarea;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('muestra listado de tareas', function(){
    $tarea = Tarea::factory()->create();

    $this->get(route('tarea.index'))
         ->assertSeeInOrder(['Titulo', 'Descripcion'])
         ->assertSee($tarea->titulo)
         ->assertStatus(200);   
});

test('muestra el formulario para la creacion de tareas', function(){
    $this->get(route('tarea.create'))
         ->assertSeeInOrder(['Titulo', 'Descripcion', 'Guardar'])
         ->assertStatus(200);   
});

test('crea una nueva tarea', function(){
    $tarea = Tarea::factory()->make();
    $this->post(route('tarea.store'),$tarea->toArray())
        ->assertRedirect(route('tarea.index'));

    $this->assertDatabaseHas('tareas', [
        'titulo' => $tarea->titulo,
        'descripcion' => $tarea->descripcion
    ]);
    
    $this->get(route('tarea.index'))
        ->assertSee($tarea->titulo);
});

test('verifica errores al crear tarea', function () {
    $tarea = Tarea::factory()->make([
        'titulo' => '',
        'descripcion' => 'Corta'
    ]);

    $this->post(route('tarea.store'), $tarea->toArray())
        ->assertInvalid(['titulo', 'descripcion']);

    $this->assertDatabaseMissing('tareas', [
        'titulo' => $tarea->titulo,
        'descripcion' => $tarea->descripcion
    ]);

    // $this->get(route('tarea.index'))
    //     ->assertSee($tarea->titulo);
});