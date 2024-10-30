<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActorRequest;
use App\Models\Actors;
use App\Models\Countries;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $actors = Actors::all();
        return view('actors/index', compact( 'actors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        //
        $country = Countries::all();
        return view('/actors/create',compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'father_name' => '',
            'birth' => 'required',
            'image' => 'required|image',
            'country_id' => 'required',

        ]);
        $actor = new Actors([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'father_name' => $request->input('father_name'),
            'birth' => $request->input('birth'),
            'country_id' => $request->input('country_id'),
        ]);
        if ($request->has('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(400, 600)->save($location);
            $actor->image = $filename;
        }
        $actor->save();
        return redirect()->route('actors-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $actors = Actors::find($id);
//        $birth = now();
//        $date = $birth->translatedFormat('j F Y');
//        dd($date);
        return view('/actors/view',compact('actors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $actors = Actors::find($id);
        $country = Countries::all();
        return view('actors/edit', compact('actors', 'country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $actors = Actors::findOrFail($id);
        $actors->first_name = $request->input('first_name');
        $actors->last_name = $request->input('last_name');
        $actors->father_name = $request->input('father_name');
        $actors->country_id = $request->input('country_id');
        $actors->birth = $request->input('birth');
        $actors->save();
        return redirect()->route('actors-show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Actors::find($id)->delete();
        return redirect()->route('actors-index');
    }
}
