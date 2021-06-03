<?php

namespace App\Http\Controllers;

use App\Models\Citoyen;
use Illuminate\Http\Request;

class CitoyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Citoyen::all();
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
        // Validate the inputs
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'dateDeNaissance' => 'required',
            'civilite' => 'required',
            'type' => 'required',
            'adresse' => 'required',
            'telephone' => 'required'
        ]);

        // ensure the request has a file before we attempt anything else.
        if ($request->hasFile('photo_path')) {

            $request->validate([
                'photo_path' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $path = $request->file('photo_path')->store('public/citoyens');

            $realpath = explode("/", $path, 2);

            $convertDrive = $request->get('driveLicense');
            $convertWeapon = $request->get('weaponLicense'); 

            $driveLicense = (isset($convertDrive)) ? 1 : 0;
            $weaponLicense = (isset($convertWeapon)) ? 1 : 0;

            // Store the record, using the new file hashname which will be it's new filename identity.
            $citoyens = new Citoyen;
                // "nom" => $request->get('nom'),
                // "prenom" => $request->get('prenom'),
                // "dateDeNaissance" => $request->get('dateDeNaissance'),
                // "civilite" => $request->get('civilite'),
                // "type" => $request->get('type'),
                // "adresse" => $request->get('adresse'),
                // "telephone" => $request->get('telephone'),
                // "photo_path" => $path//$request->file->hashName(),
                // "telephone" => $request->get('telephone'),
                // "driveLicense" => $request->get('driveLicense'),
                // "weaponLicense" => $request->get('weaponLicense')
            $citoyens->nom = $request->get('nom');
            $citoyens->prenom = $request->get('prenom');
            $citoyens->dateDeNaissance = $request->get('dateDeNaissance');
            $citoyens->civilite = $request->get('civilite');
            $citoyens->type = $request->get('type');
            $citoyens->adresse = $request->get('adresse');
            $citoyens->telephone = $request->get('telephone');
            $citoyens->photo_path = $realpath[1];
            $citoyens->driveLicense = $driveLicense ;
            $citoyens->weaponLicense = $weaponLicense;
            
            $citoyens->save(); // Finally, save the record.

            return "user creer";
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citoyen  $citoyen
     * @return \Illuminate\Http\Response
     */
    public function show(Citoyen $citoyen)
    {
        return $citoyen;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citoyen  $citoyen
     * @return \Illuminate\Http\Response
     */
    public function edit(Citoyen $citoyen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citoyen  $citoyen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citoyen $citoyen)
    {


            $citoyen->driveLicense = $request->get('driveLicense');
            $citoyen->weaponLicense = $request->get('weaponLicense');
            $citoyen->isWanted = $request->get('isWanted');
            $citoyen->isSummoned = $request->get('isSummoned');

            if ($citoyen->update()) {
                return response()->json([
                    'success' => 'Citoyen modifié avec succès'
                ], 200);
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citoyen  $citoyen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citoyen $citoyen)
    {
        //
    }

}
