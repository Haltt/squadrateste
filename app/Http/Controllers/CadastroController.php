<?php

namespace App\Http\Controllers;

use App\Cadastro;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cadastros = Cadastro::latest()->paginate(5);

        return view('cadastros.index', compact('cadastros'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'valor' => 'required',
        ]);

        Cadastro::create($request->all());

        return redirect()->route('cadastros.index')
            ->with('success', 'Cadastro created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Cadastro $product
     * @return \Illuminate\Http\Response
     */
    public function show(Cadastro $cadastro)
    {
        return view('cadastros.show', compact('cadastro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Cadastro $cadastro
     * @return \Illuminate\Http\Response
     */
    public function edit(Cadastro $cadastro)
    {
        return view('cadastros.edit', compact('cadastro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Cadastro $cadastro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cadastro $cadastro)
    {
        $request->validate([
            'nome' => 'required',
            'valor' => 'required',
            'descricao' => 'required',
        ]);

        $cadastro->update($request->all());

        return redirect()->route('cadastros.index')
            ->with('success', 'Cadastro updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Cadastro $cadastro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cadastro $cadastro)
    {
        $cadastro->delete();

        return redirect()->route('cadastros.index')
            ->with('success', 'Cadastro deleted successfully');
    }
}
