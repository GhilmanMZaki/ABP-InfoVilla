<?php

namespace App\Http\Controllers;

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
        $villa = Villa::latest();
        if (request('search')) {
            $villa->where('lokasi', 'like', '%' . request('search') . '%');
        }
        return view('kelolaVilla', compact('villa'));
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
        $validated = $request->validate([
            'namaVilla' => 'required|unique:villas|min:5|max:100',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);
        $fileName = Str::slug($request->namaVilla);
        $fileName .= '.' . $request->file('image')->guessClientExtension();
        $request->file('image')->storeAs('public/images', $fileName);
        $validated['image'] = $fileName;

        Villa::create($validated);
        return redirect('/dashboard/villa')->with('status', 'Upload berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $data = Villa::find($id);
        $data->delete();
        return redirect('/dashboard/villa')->with('status', 'Data telah dihapus');
    }

    public function viewVilla()
    {
        $villa = Villa::latest();
        if (request('id')) {
            $villa->where('id', 'like', '%' . request('id') . '%');
        }
        return view('villa', [
            "villa" => $villa->get()
        ]);
    }
}
