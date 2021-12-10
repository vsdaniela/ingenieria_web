<?php

namespace App\Http\Controllers;
use App\Propietarios; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\MessageRecieved;
use Illuminate\Support\Facades\Mail;

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
            'telefono_propietario' => 'required'
        ]);
        DB::table('propietarios')->insert([
            'dni_propietario' => $store_data['dni_propietario'],
            'nombres_prop' => $store_data['nombres_prop'],
            'direccion_prop' => $store_data['direccion_prop'],
            'telefono_propietario' => $store_data['telefono_propietario']
        ]);
        $cuerpo=$request->all();
        //$out->writeln(gettype($store_data));
        $correito = auth()->user()->email;
        $out->writeln($correito);
        Mail::to($correito)->send(new MessageRecieved($cuerpo));
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
    public function update(Request $request,$dni_propietario)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln($dni_propietario);
        $faq = $request->except(['_token', '_method' ]);
        Propietarios::where('dni_propietario','=',$dni_propietario)->update($faq);
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
