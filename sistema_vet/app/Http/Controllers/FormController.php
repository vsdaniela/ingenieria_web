<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MessageRecieved;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function create()
    {
        return view('emails.form');
    }
    public function store(Request $request)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln($request->all());
        $cuerpo=$request->all();
        $out->writeln('........................');
        $out->writeln($cuerpo['correo']);
        Mail::to($cuerpo['correo'])->send(new MessageRecieved($cuerpo));
        
        return 'Mensaje enviado';

    }
    //
}
