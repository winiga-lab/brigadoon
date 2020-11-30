<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Offres = Offre::all();
            return response()->json([
                    "success" => true,
                    "message" => "Offre List",
                    "data" => $Offres
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
		$validateOffre = $request->validate ([
            'libelle' => ['required', 'max:32'],
            'description' => ['required', 'max:255'],
            'date_publication' => ['required'],
            'date_expiration' => ['required'],
        ]);
		
		$offre = Offre::firstOrCreate([
            'libelle' => $validateOffre['libelle'],
            'description' => $validateOffre['description'],
            'date_publication' => $validateOffre['date_publication'],
            'date_expiration' => $validateOffre['date_expiration'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offre  $Offre
     * @return \Illuminate\Http\Response
     */
    public function show(Offre $Offre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offre  $Offre
     * @return \Illuminate\Http\Response
     */
    public function edit(Offre $Offre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offre  $Offre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offre $Offre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offre  $Offre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offre $Offre)
    {
        //
    }
}
