<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlladorSalones extends Controller
{
    // Método para la página de inicio
    public function home()
    {
        return view('home');
    }

    // Método para la página de contacto
    public function contact($numero = null)
    {
        return view('contacto', ['numero' => $numero]);
    }

    // Método para mostrar salones disponibles según la zona
    public function salones_disponibles($zona = 'Ituzaingo')
    {
        return view('salones_disponibles', ['zona' => $zona]);
    }
}
