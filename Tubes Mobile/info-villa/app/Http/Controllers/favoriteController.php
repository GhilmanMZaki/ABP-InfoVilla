<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Villa;
use Illuminate\Http\Request;

class favoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $villa = Villa::find($id);

        if (!$villa) {
            return response([
                'message' => 'Villa not found'
            ], 403);
        }

        $favorite = $villa->favorite()->where('user_id', auth()->user()->id)->first();

        if (!$favorite) {
            Favorite::create([
                'user_id' => auth()->user()->id,
                'villa_id' => $id
            ]);

            return response([
                'message' => 'Favorited'
            ], 200);
        }

        $favorite->delete();

        return response([
            'message' => 'Favorite Deleted'
        ], 200);
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
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $favorite = Favorite::where('user_id', auth()->user()->id)->get();
        return response(["favorite" => $favorite], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite $favorite)
    {
        //
    }
}
