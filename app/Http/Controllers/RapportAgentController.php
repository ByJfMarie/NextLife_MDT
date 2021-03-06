<?php

namespace App\Http\Controllers;

use App\Models\RapportAgent;
use Illuminate\Http\Request;

class RapportAgentController extends Controller
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
        $newRapport = new RapportAgent;
                
        $newRapport->date_fait = $request->get('date_fait');
        $newRapport->heure_fait = $request->get('heure_fait');
        $newRapport->description = $request->get('description');
        $newRapport->id_agent = $request->get('id_agent');
        $newRapport->id_rapport_arrestation = $request->get('id_rapport-arrestation');

        if ($newRapport->save()) {
            return response()->json([
                         'success' => 'Rapport crée avec succés'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RapportAgent  $rapportAgent
     * @return \Illuminate\Http\Response
     */
    public function show(RapportAgent $rapportAgent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RapportAgent  $rapportAgent
     * @return \Illuminate\Http\Response
     */
    public function edit(RapportAgent $rapportAgent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RapportAgent  $rapportAgent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RapportAgent $rapportAgent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RapportAgent  $rapportAgent
     * @return \Illuminate\Http\Response
     */
    public function destroy(RapportAgent $rapportAgent)
    {
        //
    }
}
