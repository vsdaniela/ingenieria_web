<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class EspecialidadController extends Controller
{
    public function index()
    {
		$out = new \Symfony\Component\Console\Output\ConsoleOutput();
           
    	$data = DB::table('especialidades')->get();
		//$out->writeln($data);
    	return view('especialidades.ajax-index', compact('data'));
    }
    function action(Request $request)
    {
    	if($request->ajax())
    	{
            $out = new \Symfony\Component\Console\Output\ConsoleOutput();
            //$out->writeln($request->action);
            if($request->action == 'edit')
    		{
    			$data = array(
    				'nombre_especialidad'=>$request->nombre_especialidad,
    			);
    			DB::table('especialidades')
    				->where('idEspecialidad', $request->idEspecialidad)
    				->update($data);
    		}
    		if($request->action == 'delete')
    		{
                //$out->writeln($request->idEspecialidad);
                DB::table('especialidades')
				->where('idEspecialidad', '=', $request->idEspecialidad)
				->delete();
    			//DB::table('especialidad')->where('idEspecialidad', $request->idEspecialidad)->delete();
                
    		}
    		return response()->json($request);
    	}
    }
}
