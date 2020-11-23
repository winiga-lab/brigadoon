<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;
use App\Models\Adresse;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personnes = Personne::all();
            return response()->json([
                    "success" => true,
                    "message" => "Personne List",
                    "data" => $personnes
                    ]);
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
        $validatePersonne = $request->validate ([
            'nom' => ['required', 'max:32'],
            'prenom' => ['required', 'max:32'],
            'sexe' => ['required', 'max:1'],
            'dte_naiss' => ['required'],
            'bio' => ['required'],
        ]);

        $validateAdress = $request->validate([
            'code_postal' => ['required', 'max:7'],
            'num_immo' => ['required', 'max:3'],
            'nom_rue' => ['required', 'max:16'],
            'nom_ville'=> ['required', 'max:32'],
        ]);

        //create new adress i fthis one don't exist 
        $adresse = Adresse::firstOrCreate([
            'code_postal' => $validateAdress['code_postal'],
            'num_immo' => $validateAdress['num_immo'],
            'nom_rue' => $validateAdress['nom_rue'],
            'nom_ville' => $validateAdress['nom_ville'],
        ]);
        $personne = new Personne();
        $personne->nom = $validatePersonne['nom'];
        $personne->prenom = $validatePersonne['prenom'];
        $personne->sexe = $validatePersonne['sexe'];
        $personne->dte_naiss = $validatePersonne['dte_naiss'];
        $personne->bio = $validatePersonne['bio'];
        $personne->adresse()->associate($adresse);

        $personne->save();

        return response()->json([
            "success" => true,
            "message" => "Succesfully create",
            "data" => $personne,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function show(Personne $personne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function edit(Personne $personne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personne $personne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personne $personne)
    {
        //
    }
}
