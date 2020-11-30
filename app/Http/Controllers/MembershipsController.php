<?php

namespace App\Http\Controllers;

use App\Models\Memberships;
use Illuminate\Http\Request;

class MembershipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Membershipss = Memberships::all();
            return response()->json([
                    "success" => true,
                    "message" => "Memberships List",
                    "data" => $Membershipss
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
		$validateMemberships = $request->validate ([
            'personne_id' => ['required', 'max:32'],
            'compte_id' => ['required', 'max:255']
        ]);
		
		$memberships = Memberships::firstOrCreate([
            'personne_id' => $validateMemberships['personne_id'],
            'compte_id' => $validateMemberships['compte_id']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Memberships  $Memberships
     * @return \Illuminate\Http\Response
     */
    public function show(Memberships $Memberships)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Memberships  $Memberships
     * @return \Illuminate\Http\Response
     */
    public function edit(Memberships $Memberships)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Memberships  $Memberships
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Memberships $Memberships)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Memberships  $Memberships
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memberships $Memberships)
    {
        //
    }
}
