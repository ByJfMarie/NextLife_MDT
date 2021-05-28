<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicules = Vehicule::select(

            "vehicules.id", 
            "vehicules.modele",  
            "vehicules.immatriculation",            
            "vehicules.type", 
            "citoyens.prenom as prenom_proprio",
            "citoyens.nom as nom_proprio",
            "vehicules.description",            
            "vehicules.isWanted",            
            "vehicules.photo_path" 
        )
        ->join("citoyens", "citoyens.id", "=", "vehicules.proprietaire")
        ->get();

        return $vehicules;
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
        $request->validate([
            'modele' => 'required',
            'immatriculation' => 'required',
            'type' => 'required',
            'description' => 'required'
        ]);

        // ensure the request has a file before we attempt anything else.
        if ($request->hasFile('photo_path')) {

            $request->validate([
                'photo_path' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $path = $request->file('photo_path')->store('public/véhicules');

            $realpath = explode("/", $path, 2);

            // Store the record, using the new file hashname which will be it's new filename identity.
            $vehicule = new Vehicule;

            $vehicule->modele = $request->get('modele');
            $vehicule->immatriculation = $request->get('immatriculation');
            $vehicule->type = $request->get('type');
            $vehicule->proprietaire = $request->get('proprietaire');
            $vehicule->description = $request->get('description');
            $vehicule->photo_path = $realpath[1];
            
            $vehicule->save(); // Finally, save the record.

            return redirect('/siv');
        }
        else {
            $vehicule = new Vehicule;

            $vehicule->modele = $request->get('modele');
            $vehicule->immatriculation = $request->get('immatriculation');
            $vehicule->type = $request->get('type');
            $vehicule->proprietaire = $request->get('proprietaire');
            $vehicule->description = $request->get('description');
            
            $vehicule->save(); // Finally, save the record.

            return redirect('/siv');
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicule $vehicule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicule $vehicule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicule $vehicule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicule $vehicule)
    {
        //
    }
}
