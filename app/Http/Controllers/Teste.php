<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Teste extends Controller
{
    public function falar()
    {
        return "teste chamar uma função de outra controller";
    }
}
