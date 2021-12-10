<?php

namespace App\Http\Controllers;

use App\Animales;
use App\Propietarios;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$propietarios = \App\Propietarios::all(array('dni_propietario','nombres_prop','direccion_prop','telefono_prop'));
        $animales = Animales::all();
        return view('animals.animal-index', compact('animales'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propietarios = \App\Propietarios::all(array('dni_propietario','nombres_prop','direccion_prop','telefono_propietario'));
        return view('animals.animal-add',compact('propietarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Animales::create($request->all());
        //$out->writeln(gettype($store_data));
        return redirect('animals');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animales  $animales
     * @return \Illuminate\Http\Response
     */
    public function show(Animales $animales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Animales  $animales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animales::findOrFail($id);
        return view('animals.animal-edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animales  $animales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idAnimal)
    {
        $faq = $request->except(['_token', '_method' ]);
        Animales::where('idAnimal','=',$idAnimal)->update($faq);
        return redirect('animals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animales  $animales
     * @return \Illuminate\Http\Response
     */
    public function destroy($idAnimal)
    {
        $ani =Animales::find($idAnimal);
        $ani->delete();
        return redirect('animals');
    }
}
