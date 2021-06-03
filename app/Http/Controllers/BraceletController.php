<?php

namespace App\Http\Controllers;

use App\Models\Bracelet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BraceletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request('citoyen')){
            $bracelet = Bracelet::select(

                "bracelets.id",
                "bracelets.num_serie", 
                "citoyens.prenom as prenom_proprio",
                "citoyens.nom as nom_proprio",
            )
            
            ->join("citoyens", "citoyens.id", "=", "bracelets.citoyen")
            ->where('citoyen', '=', request('citoyen'))
            ->get();
        }
        else{
                $bracelet = Bracelet::select(
    
                    "bracelets.id",
                    "bracelets.num_serie", 
                    "citoyens.prenom as prenom_proprio",
                    "citoyens.nom as nom_proprio",
                )
                
                ->join("citoyens", "citoyens.id", "=", "bracelets.citoyen")
                ->get();
   
        }

        return $bracelet;
        
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
        $random = Str::random(10);

        $bracelet = new Bracelet;

        $bracelet->num_serie = $random;
        $bracelet->citoyen = $request->get('id');

        if ($bracelet->save()) {
            return response()->json([
                'success' => 'Bracelet crée avec succès'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bracelet  $bracelet
     * @return \Illuminate\Http\Response
     */
    public function show(Bracelet $bracelet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bracelet  $bracelet
     * @return \Illuminate\Http\Response
     */
    public function edit(Bracelet $bracelet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bracelet  $bracelet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bracelet $bracelet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bracelet  $bracelet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bracelet $bracelet)
    {
        if ($bracelet->delete()) {
            return response()->json([
                'success' => 'Bracelet supprimé avec succés'
            ], 200);
        }
    }
}
