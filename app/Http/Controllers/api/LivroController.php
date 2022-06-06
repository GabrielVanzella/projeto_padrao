<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return Livro::all();
    }

    public function store(Request $request)
    {
        Livro::create($request->all());
        return Livro::all();
    }

    public function show($id)
    {
        return Livro::findOrfail($id);
    }

    public function update(Request $request, $id)
    {
        $livro = Livro::findOrfail($id);
        $livro->update($request->all());
        return Livro::all();
    }

    public function destroy($id)
    {
        $livro = Livro::findOrfail($id);
        $livro->delete();
        return Livro::all();
    }
}
