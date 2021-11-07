<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacunas; // Instanciamos el modelo Vacunas
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;
use Illuminate\Support\Facades\Session;


class VacunasController extends Controller
{
    public function index()
    {
        //$vacunas = Vacunas::all();
        $vacunas = DB::table('vacunas')->get();
        return view('vacunas.master', compact('vacunas'));

        //return 'Holaa';
    }
    public function create()
    {
        return view('vacunas.create');
    }
    public function store(Request $request)
    {
        //$storeData=$request->validate([ 'nombre_vacuna' => 'required', 'fecha_vacuna' => 'required','descripcion_vacuna' => 'required',]);
        //$vacuna=Vacunas::create($storeData);
        
        $vacuna = new Vacunas;
        $vacuna->create($request->all());
        return redirect('vacunas');
        //return redirect()->route('vacunas.index');
    }

    public function edit($id_vacuna)
    {
        $vacuna = Vacunas::findOrFail($id_vacuna);
        return view('vacunas.edit',compact($vacuna));
    }
    public function update(ItemUpdateRequest $request, $id_vacuna)
    {        
        $storeData=$request->validate([
            'nombre_vacuna' => 'required',
            'fecha_vacuna' => 'required',
            'descripcion_vacuna' => 'required',
        ]);
        Vacunas::whereId($id_vacuna)->update($storeData);
        return redirect('/vacunas');
    }
    public function destroy($id_vacuna)
    {
        //$vacuna = Vacunas::findOrFail($id_vacuna);

        //$vacuna->delete();
        $vacuna = Vacunas::findOrFail($id_vacuna);
        $vacuna->delete();
        return redirect('vacunas')->with('deleted','Eliminado');
    }
    public function destroy_ajax($id_vacuna)
    {
        $vacuna = Vacunas::findOrFail($id_vacuna);
        $vacuna->delete();
        return response()->json(['success'=>'Eliminado']);
    }

}
