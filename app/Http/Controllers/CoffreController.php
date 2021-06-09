<?php

namespace App\Http\Controllers;

use App\Models\Coffre;
use Illuminate\Http\Request;

class CoffreController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request('id_citoyenW')){
            $item = Coffre::select(

                "coffres.id",
                "coffres.nom",
                "coffres.type",
                "coffres.quantity",
            )
            ->where('id_citoyen', '=', request('id_citoyenW'))
            ->where('type', '=', 'weapon')
            ->get();
        }

        if (request('id_citoyenO')){
            $item = Coffre::select(
                "coffres.id",
                "coffres.nom",
                "coffres.type",
                "coffres.quantity",
            )
            ->where('id_citoyen', '=', request('id_citoyenO'))
            ->where('type', '=', 'object')
            ->get();
        }

        return $item;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Coffre;

        $item->id_citoyen = $request->get('id_citoyen');
        $item->nom = $request->get('nom');
        $item->type = $request->get('type');
        $item->quantity = $request->get('quantity');

        if ($item->save()) {
            return response()->json([
                'success' => 'Item ajouté avec succès'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coffre  $coffre
     * @return \Illuminate\Http\Response
     */
    public function show(Coffre $coffre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coffre  $coffre
     * @return \Illuminate\Http\Response
     */
    public function edit(Coffre $coffre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coffre  $coffre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coffre $coffre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coffre  $coffre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coffre $coffre)
    {
        if ($coffre->delete()) {
            return response()->json([
                'success' => 'Item supprimé avec succés'
            ], 200);
        }
    }
}
