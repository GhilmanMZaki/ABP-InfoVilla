<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class villaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'villa' => Villa::orderBy('created_at')->withCount('review', 'favorite')->with('review')->get()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function villaDesc()
    {

        $villa = Villa::all();
        return view('villa', compact('villa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->isAdmin != 1) {
            return response(['message' => 'Permission denied'], 403);
        }

        $validated = $request->validate([
            'namaVilla' => 'required|unique:villas|min:5|max:100',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            // 'image' => 'required|mimes:jpg,png,jpeg',
        ]);
        // $fileName = Str::slug($request->namaVilla);
        // $fileName .= '.' . $request->file('image')->guessClientExtension();
        // $request->file('image')->storeAs('public/images', $fileName);
        // $validated['image'] = $fileName;

        $villa = Villa::create($validated);
        return response([
            'message' => 'Villa created',
            'villa' => $villa
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response([
            'villa' => Villa::where('id', $id)->withCount('review', 'favorite')->get()
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->isAdmin != 1) {
            return response(['message' => 'Permission denied'], 403);
        }
        $data = Villa::find($id);
        $data->review()->delete();
        $data->delete();
        return response(['message' => 'Villa deleted!'], 200);
    }

    public function viewVilla($id)
    {
        $review = Review::latest();
        $review->where('villa_id', $id);
        $villa = Villa::latest();
        if (request('id')) {
            $villa->where('id', $id)->first();
        }
        return view('villa', [
            "villa" => $villa->get(),
            "review" => $review->get()
        ]);
    }
}
