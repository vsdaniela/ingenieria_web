<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Propietarios; 
class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$propietarios = DB::table('propietarios')->get();
        $propietarios = Propietarios::all();
        return view('owners.owner-index', compact('propietarios'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owners.owner-add');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln("-------------------------");
        $store_data=$request->validate([
            'dni_propietario' => 'required',
            'nombres_prop' => 'required',
            'direccion_prop' => 'required',
            'telefono_prop' => 'required'
        ]);
        DB::table('propietarios')->insert([
            'dni_propietario' => $store_data['dni_propietario'],
            'nombres_prop' => $store_data['nombres_prop'],
            'direccion_prop' => $store_data['direccion_prop'],
            'telefono_prop' => $store_data['telefono_prop']
        ]);
        //$out->writeln(gettype($store_data));
        return redirect('pet-owners')->with('success','Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propietario = Propietarios::findOrFail($id);
        return view('owners.owner-edit', compact('propietario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Propietarios $propietario)
    {
        DB::table('propietarios')->where('dni_propietario', (string)$propietario->dni_propietario)
       ->update([
           'nombres_prop' => (string)$request['nombres_prop'],
           'direccion_prop' => (string)$request['direccion_prop'],
           'telefono_prop' => (string)$request['telefono_prop'],
        ]);
        //$prop->update($request->all());
        return redirect('pet-owners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($dni_propietario)
    {
        $prop =Propietarios::find($dni_propietario);

        $prop->delete();
        return redirect('pet-owners')->with('success', 'Product deleted successfully');
    }
}
