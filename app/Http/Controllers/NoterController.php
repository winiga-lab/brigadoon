<?php

namespace App\Http\Controllers;

use App\Models\Noter;
use Illuminate\Http\Request;

class NoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Noters = Noter::all();
            return response()->json([
                    "success" => true,
                    "message" => "Noter List",
                    "data" => $Noters
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
		$validateNoter = $request->validate ([
            'note' => ['required', 'max:32'],
            'noteur' => ['required', 'max:255'],
			'notee' => ['required', 'max:255']
        ]);
		
		$Noter = Noter::firstOrCreate([
            'note' => $validateNoter['note'],
            'noteur' => $validateNoter['noteur'],
			'notee' => $validateNoter['notee']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noter  $Noter
     * @return \Illuminate\Http\Response
     */
    public function show(Noter $Noter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noter  $Noter
     * @return \Illuminate\Http\Response
     */
    public function edit(Noter $Noter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noter  $Noter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noter $Noter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noter  $Noter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noter $Noter)
    {
        //
    }
}
