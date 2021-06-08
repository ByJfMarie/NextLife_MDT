<?php

namespace App\Http\Controllers;

use App\Models\AccessToken;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AccessTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $access_token = AccessToken::select(

            "access_tokens.grade",
        )
        ->where('access_token', '=', request('access_token'))
        ->get();

        return $access_token;
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
        $random = Str::random(10);

        $accessToken = new AccessToken;

        $accessToken->access_token = $random;
        $accessToken->grade = $request->get('grade');

        if ($accessToken->save()) {
            return response()->json([
                'success' => 'Bracelet crée avec succès',
                'token' => $random
            ], 200);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccessToken  $accessToken
     * @return \Illuminate\Http\Response
     */
    public function show(AccessToken $accessToken)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccessToken  $accessToken
     * @return \Illuminate\Http\Response
     */
    public function edit(AccessToken $accessToken)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccessToken  $accessToken
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccessToken $accessToken)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccessToken  $accessToken
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccessToken $accessToken)
    {
        //
    }
}
