<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeroesRequest;
use App\Models\Actors;
use App\Models\Animations;
use App\Models\Heroes;
use Illuminate\Http\Request;

class HeroesController extends Controller
{
    public function index()
    {
        //
        $heroes = Heroes::with('animation')->get();
        return view('/heroes/index', compact('heroes'));
    }
    public function create()
    {
        //
        $animations = Animations::all();
        $actors = Actors::all();
//        foreach ($actors as $actor){
//        dd($actor->id);
//        }
        return view('/heroes/create',compact('animations', 'actors'));
    }
    public function store(HeroesRequest $req)
    {
        $validatedData = $req->validate([
            'name' => 'required',
            'nickname' => '',
            'description' => 'required',
            'actor_id' => 'required',
            'animation_id' => 'required',
        ]);
        $heroes = new Heroes([
            'name' => $req->input('name'),
            'nickname' => $req->input('nickname'),
            'description' => $req->input('description'),
            'actor_id' => $req->input('actor_id'),
            'animation_id' => $req->input('animation_id'),
        ]);
        $heroes->save();
        return redirect()->route('heroes-index');
    }
    public function show($id)
    {
        //
        $heroes = Heroes::find($id);
        return view('/heroes/view',compact('heroes'));
    }
    public function edit(string $id)
    {
        //
        $heroes = Heroes::find($id);
        $animations = Animations::all();
        $actors = Actors::all();
        return view('heroes/edit', compact('heroes', 'animations', 'actors'));
    }
    public function update(HeroesRequest $req, string $id)
    {
        //
        $heroes = Heroes::findOrFail($id);
        $heroes->name = $req->input('name');
        $heroes->nickname = $req->input('nickname');
        $heroes->description = $req->input('description');
        $heroes->animation_id = $req->input('animation_id');
        $heroes->actor_id = $req->input('actor_id');
        $heroes->save();
        return redirect()->route('heroes-show', $id);
    }
    public function destroy(string $id)
    {
        //
        Heroes::find($id)->delete();
        return redirect()->route('heroes-index');
    }
}
