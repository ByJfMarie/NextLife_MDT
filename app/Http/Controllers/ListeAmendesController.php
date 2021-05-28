<?php

namespace App\Http\Controllers;

use App\Models\ListeAmendes;
use Illuminate\Http\Request;

class ListeAmendesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ListeAmendes::all();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListeAmendes  $listeAmendes
     * @return \Illuminate\Http\Response
     */
    public function show(ListeAmendes $listeAmendes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListeAmendes  $listeAmendes
     * @return \Illuminate\Http\Response
     */
    public function edit(ListeAmendes $listeAmendes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListeAmendes  $listeAmendes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListeAmendes $listeAmendes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListeAmendes  $listeAmendes
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListeAmendes $listeAmendes)
    {
        //
    }
}
