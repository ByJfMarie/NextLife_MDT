<?php

namespace App\Http\Controllers;

use App\Models\HistoriqueAmendes;
use Illuminate\Http\Request;

class HistoriqueAmendesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HistoriqueAmendes::all();
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

        $amende = new HistoriqueAmendes;

        $amende->citoyen =  $request->get('citoyen');
        $amende->prix =  $request->get('prix');
        $amende->descriptif =  json_encode($request->get('descriptif'));

        $amende->save();

        // if(HistoriqueAmendes::create($request->all())){
        //     return response()->json([
        //         'success' => 'Amendes enregistrée avec succés'
        //     ], 200);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoriqueAmendes  $historiqueAmendes
     * @return \Illuminate\Http\Response
     */
    public function show(HistoriqueAmendes $historique_amende)
    {
        $amende = HistoriqueAmendes::select(

            "historique_amendes.id", 
            "historique_amendes.prix",
            "historique_amendes.descriptif",
            "citoyens.nom as nom",
            "citoyens.prenom as prenom",
            "citoyens.dateDeNaissance as dateDeNaissance",
            "citoyens.civilite as civilite",
            "citoyens.type as type",
            "citoyens.adresse as adresse",
            "citoyens.telephone as telephone"


        )

        ->join("citoyens", "citoyens.id", "=", "historique_amendes.citoyen")

        ->where("historique_amendes.id", "=", $historique_amende->id)

        ->get();

        $test = $amende + json_decode($historique_amende->descriptif);


        return $test;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoriqueAmendes  $historiqueAmendes
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoriqueAmendes $historiqueAmendes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoriqueAmendes  $historiqueAmendes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoriqueAmendes $historiqueAmendes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoriqueAmendes  $historiqueAmendes
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoriqueAmendes $historiqueAmendes)
    {
        //
    }
}
