<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class reviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'review' => Review::orderBy('created_at')->with('user')->get()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // $validated = $request->validate([
        //     'image' => 'mimes:jpg,png,jpeg'
        // ]);
        // if ($request->file('image')) {
        //     $fileName = $request->file('image')->getClientOriginalName();
        //     $request->file('image')->storeAs('public/images/', $fileName);
        //     $validated['image'] = $fileName;
        // }
        $rating = (int)$request->rating;
        $validated['user_id'] = auth()->user()->id;
        $validated['villa_id'] = $id;
        $validated['review'] = $request->review;
        $validated['rating'] = $rating;
        $review = Review::create($validated);
        $jml_review = Review::where('villa_id', $validated['villa_id'])->avg('rating');
        $banyak_review = Review::where('villa_id', $validated['villa_id'])->count('rating');;
        $villa = Villa::find($validated['villa_id']);
        $villa->jml_review = $banyak_review;
        $villa->rating = number_format($jml_review, 2);
        $villa->save();
        return response([
            'review' => $review,
            'message' => 'Upload review success'
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
        $villa = Villa::find($id);

        if (!$villa) {
            return response([
                'message' => 'Villa not found'
            ], 403);
        }

        return response([
            'villa' => $villa->review()->with('user')->get()
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
        $data = Review::find($id);
        $villa_id = $data->villa_id;
        $data->delete();
        $jml_review = Review::where('villa_id', $villa_id)->avg('rating');
        $banyak_review = Review::where('villa_id', $villa_id)->count('rating');
        $villa = Villa::find($villa_id);
        $villa->jml_review = $banyak_review;
        $villa->rating = number_format($jml_review, 2);
        $villa->save();
        return response([
            'message' => 'Review deleted'
        ]);
    }
}
