<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;

class PagesController extends Controller
{
    public function home(){
    return view('welcome');
    }

    public function notas(){
        $notas = Nota::all();
        return view('notas',compact('notas'));
    }

    public function detalle($id){
        $notas = Nota::findOrFail($id);
        return view('notas.detalle',compact('notas'));
    }

    public function crear(Request $request){
    /* return $request->all(); */

    $request->validate([
        'name'=> 'required',
        'desc' => 'required'
    ]);

    $notaNueva = new Nota;
    $notaNueva->name = $request->name;
    $notaNueva->desc = $request->desc;

    $notaNueva->save();

    return back()->with('message','Nota agregada con éxito');
    }

    public function editar($id){
        $notas = Nota::findOrFail($id);
    return view ('notas.editar',compact('notas'));
    }

    public function update(Request $request,$id){
        $notaUpdate = Nota::findOrFail($id);
        $request->validate([
            'name'=> 'required',
            'desc' => 'required'
        ]);
        $notaUpdate->name = $request->name;
        $notaUpdate->desc = $request->desc;
        $notaUpdate->save();

        return redirect()->action([PagesController::class,'notas'])->with('message', 'Nota actualizada');
    }
    public function delete($id){

    $notaDelete = Nota::findOrFail($id);
    $notaDelete->delete();
        return redirect()->action([PagesController::class,'notas'])->with('message', 'Nota eliminada');
    }

    public function fotos(){
      
    return view ('fotos');
    }

    public function blog(){
    return view ('blog');
    }

    public function nosotros($name = null){
    
    
$team = ['Pedro','Irina'];


// return view ('nosotros',['team' => $team]);
    return view ('nosotros',compact('team')); // pero ambos deben llamarse igual
}
}
