<?php

namespace App\Http\Controllers;

use App\Models\RapportArresation;
use Illuminate\Http\Request;

class RapportArresationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        $newRapport = new RapportArresation;
                
        $newRapport->date_arrestation = $request->get('date_arrestation');
        $newRapport->heure_arrestation = $request->get('heure_arrestation');
        $newRapport->addresse_pdp = $request->get('addresse_pdp');
        $newRapport->date_rapport = $request->get('date_rapport');
        $newRapport->description = $request->get('description');
        $newRapport->id_police = $request->get('id_police');
        $newRapport->id_citoyen = $request->get('idCitoyen');
        $newRapport->id_amende = $request->get('id_amende');

        if ($newRapport->save()) {
            return response()->json([
                         'success' => 'Rapport crée avec succés'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RapportArresation  $rapportArresation
     * @return \Illuminate\Http\Response
     */
    public function show(RapportArresation $rapportArresation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RapportArresation  $rapportArresation
     * @return \Illuminate\Http\Response
     */
    public function edit(RapportArresation $rapportArresation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RapportArresation  $rapportArresation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RapportArresation $rapportArresation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RapportArresation  $rapportArresation
     * @return \Illuminate\Http\Response
     */
    public function destroy(RapportArresation $rapportArresation)
    {
        //
    }
}
