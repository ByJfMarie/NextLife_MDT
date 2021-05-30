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
        if(HistoriqueAmendes::create($request->all())){
            return response()->json([
                'success' => 'Amendes enregistrée avec succés'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoriqueAmendes  $historiqueAmendes
     * @return \Illuminate\Http\Response
     */
    public function show(HistoriqueAmendes $historiqueAmendes)
    {
        //
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
