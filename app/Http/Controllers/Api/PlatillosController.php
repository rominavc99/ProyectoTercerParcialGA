<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Platillo;

class PlatillosController extends Controller
{
    public function index() {
        $platillos = Platillo::select('id', 'nombre', 'precio')->get();
        return $platillos;
    }

    public function show($id) {
        $platillo = Platillo::select('id', 'descripcion', 'foto')->where('id', $id)->first();
        return $platillo;
    }
}