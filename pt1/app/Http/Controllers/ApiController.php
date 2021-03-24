<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Autor;
use App\Models\Llibre;
use Illuminate\Http\Request;
class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function getLlibres () {
        return Llibre::all();
     }
     function getAutors () {
      return Autor::all();
   }
     function getLlibre (Request $request, $id) {
      $llibres = Llibre::all();
      $llibre = $llibres->firstWhere('id',$id);
      return $llibre;
   }
   function getAutor (Request $request, $id) {
    $llibres = Autor::all();
    $llibre = $llibres->firstWhere('id',$id);
    return $llibre;
 }
     function updateLlibre (Request $request, $id) {
        //cal posar en la peticio PUT el Header field:
        //Content-Type = application/x-www-form-urlencodeda va
        $llibre = Llibre::find($id);
        $llibre->update($request->all());
  
        return $llibre;
      }
      function crearLlibre(Request $request){
         $llibre = new Llibre;
         $llibre->titol = $request->titol;
         $llibre->data_public = $request->data_public;
         $llibre->autor_id = $request->autor_id;
         $llibre->save();

      return $llibre;
      }
      function crearAutor(Request $request){
         $llibre = new Autor;
         $llibre->nom = $request->nom;
         $llibre->cognoms= $request->cognoms;
         $llibre->save();

      return $llibre;
      }
      function eliminarLlibre($id){
         $llibre = Llibre::find($id);
        $llibre->delete();
         return $llibre;
      }
}
