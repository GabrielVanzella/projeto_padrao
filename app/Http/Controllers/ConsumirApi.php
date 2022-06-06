<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConsumirApi extends Controller
{
    public function consumir_api()
    {
        $response = Http::get('https://viacep.com.br/ws/01001000/json/');
        dd($response->json());
    }
}
