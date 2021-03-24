<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Autor;
use App\Models\Llibre;
use Illuminate\Http\Request;
/**
 * @OA\Info(title="API Usuarios", version="1.0")
 *
 * @OA\Server(url="http://localhost/M7/UF4/pt2a/public")
 */
class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
    * @OA\Get(
    *   path="/api/llibres",
    *   tags={"llibres"},
    *   summary="Veure tots els llibres.",
    *   @OA\Response(
    *     response=200,
    *     description="Retorna tots els llibres.",
    *   ),
    *   @OA\Response(
    *     response="default",
    *     description="S'ha produit un error.",
    *   )
    * )
    */
    function getLlibres () {
        return Llibre::all();
     }
   /**
    * @OA\Get(
    *   path="/api/autors",
    *   tags={"autors"},
    *   summary="Veure tots els autors.",
    *   @OA\Response(
    *     response=200,
    *     description="Retorna tots els autors.",
    *   ),
    *   @OA\Response(
    *     response="default",
    *     description="S'ha produit un error.",
    *   )
    * )
    */
     function getAutors () {
      return Autor::all();
   }
   /**
     * @OA\Get(
     *     path="/api/llibre/{id}",
     *     tags={"llibres"},
     *     description="",
     *
     *   @OA\Parameter(
     *         description="Id llibre a modificar",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Llibre modificat",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="S'ha produit un error",
     *     )
     * )
     */
     function getLlibre (Request $request, $id) {
      $llibres = Llibre::all();
      $llibre = $llibres->firstWhere('id',$id);
      return $llibre;
   }
   /**
     * @OA\Get(
     *     path="/api/autor/{id}",
     *     tags={"autors"},
     *     description="",
     *
     *   @OA\Parameter(
     *         description="Id llibre a modificar",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Llibre modificat",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="S'ha produit un error",
     *     )
     * )
     */
   function getAutor (Request $request, $id) {
    $llibres = Autor::all();
    $llibre = $llibres->firstWhere('id',$id);
    return $llibre;
 }
 /**
     * @OA\Put(
     *     path="/api/llibre/{id}",
     *     tags={"llibres"},
     *     operationId="updateLlibre",
     *     summary="Actualitza llibre ja existent",
     *     description="",
     *
     *   @OA\Parameter(
     *         description="Id llibre a modificar",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *   @OA\Parameter(
     *         description="Titol llibre",
     *         in="query",
     *         name="titol",
     *         required=true,
     *         @OA\Schema(
     *           type="string"
     *         )
     *     ),
     *   @OA\Parameter(
     *         description="Data de publicacio YYYY-mm-dd",
     *         in="query",
     *         name="data_public",
     *         required=true,
     *         @OA\Schema(
     *           type="string",
     *         )
     *     ),
     *   @OA\Parameter(
     *         description="Id autor",
     *         in="query",
     *         name="autor_id",
     *         required=true,
     *         @OA\Schema(
     *           type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Llibre modificat",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="S'ha produit un error",
     *     )
     * )
     */
     function updateLlibre (Request $request, $id) {
        //cal posar en la peticio PUT el Header field:
        //Content-Type = application/x-www-form-urlencodeda va
        $llibre = Llibre::find($id);
        $llibre->update($request->all());
  
        return $llibre;
      }
      /**
    * @OA\Post(
    *   path="/api/llibre",
    *   tags={"llibres"},
    *   summary="Inserir un nou llibre.",
    *   @OA\Parameter(
    *     name="titol",
    *     description="titol del llibre",
    *     required=true,
    *     in="query",
    *     @OA\Schema(
    *       type="string"
    *     )
    *   ), 
    *   @OA\Parameter(
    *     name="data_public",
    *     description="data de publicació del llibre",
    *     required=true,
    *     in="query",
    *     @OA\Schema(
    *       type="string"
    *     )
    *   ),
    *   @OA\Parameter(
    *     name="autor_id",
    *     description="id de l'autor del llibre",
    *     required=true,
    *     in="query",
    *     @OA\Schema(
    *       type="integer"
    *     )
    *   ),
    *   @OA\Response(
    *     response=200,
    *     description="Retorna el llibre que hem inserit.",
    *   ),
    *   @OA\Response(
    *     response="default",
    *     description="S'ha produit un error.",
    *   )
    * )
    */
      function crearLlibre(Request $request){
         $llibre = new Llibre;
         $llibre->titol = $request->titol;
         $llibre->data_public = $request->data_public;
         $llibre->autor_id = $request->autor_id;
         $llibre->save();

      return $llibre;
      }
      /**
    * @OA\Post(
    *   path="/api/autor",
    *   tags={"autors"},
    *   summary="Inserir un nou autors.",
    *   @OA\Parameter(
    *     name="nom",
    *     description="nom del autor",
    *     required=true,
    *     in="query",
    *     @OA\Schema(
    *       type="string"
    *     )
    *   ),
    *   @OA\Parameter(
    *     name="cognoms",
    *     description="cognom del autor",
    *     required=true,
    *     in="query",
    *     @OA\Schema(
    *       type="string"
    *     )
    *   )
    *   ,
    *   @OA\Response(
    *     response=200,
    *     description="Retorna el autor que hem inserit.",
    *   ),
    *   @OA\Response(
    *     response="default",
    *     description="S'ha produit un error.",
    *   )
    * )
    */
      function crearAutor(Request $request){
         $llibre = new Autor;
         $llibre->nom = $request->nom;
         $llibre->cognoms= $request->cognoms;
         $llibre->save();

      return $llibre;
      }
      /**
     * @OA\Delete(
     *     path="/api/llibre/{id}",
     *     tags={"llibres"},
     *     description="",
     *
     *   @OA\Parameter(
     *         description="Id llibre a modificar",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Llibre modificat",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="S'ha produit un error",
     *     )
     * )
     */
      function eliminarLlibre($id){
         $llibre = Llibre::find($id);
        $llibre->delete();
         return $llibre;
      }
}
