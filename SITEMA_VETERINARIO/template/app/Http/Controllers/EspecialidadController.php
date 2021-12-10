<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class EspecialidadController extends Controller
{
    function index()
    {
    	$data = DB::table('especialidades')->get();
    	return view('especialidades.ajax-index', compact('data'));
    }
    function action(Request $request)
    {
    	if($request->ajax())
    	{
            $out = new \Symfony\Component\Console\Output\ConsoleOutput();
            $out->writeln($request->action);
            if($request->action == 'edit')
    		{
    			$data = array(
    				'nombre_Especialidadcol'=>$request->nombre_Especialidadcol,
    			);
    			DB::table('especialidades')
    				->where('idEspecialidad', $request->idEspecialidad)
    				->update($data);
    		}
    		if($request->action == 'delete')
    		{
                $out->writeln($request->idEspecialidad);
                $x=DB::table('especialidades')->where('idEspecialidad', '=', $request->idEspecialidad)->delete();
                $out->writeln($x);
    			//DB::table('especialidad')->where('idEspecialidad', $request->idEspecialidad)->delete();
                
    		}
    		return response()->json($request);
    	}
    }
}
