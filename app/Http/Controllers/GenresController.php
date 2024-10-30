<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenresRequest;
use App\Models\Genres;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class GenresController extends Controller
{
    //
    public function genresIndex(){

        $genres = new Genres();
        return view('/genres/genresIndex',['name'=>$genres->orderBy('name','asc')->get()]);
    }
    public function genresOne($id){
        $genres = new Genres();
        return view('/genres/genresOne',['name'=>$genres->find($id)]);

    }
    public function genres(){
        $genres = Genres::all();
        return view('/genres/genresCreate',compact('genres'));
    }
    public function genresCreate(GenresRequest $req){
        $genres = new Genres();
        $genres->name=$req->input('name');
        $genres->save();
        return redirect()->route('genres-view');
    }
    public function genresUpdate($id, GenresRequest $req){
        $genres = Genres::find($id);
        $genres->name=$req->input('name');
        $genres->save();
        return redirect()->route('genres-view');
    }
    public function genresDelete($id){
        try{Genres::find($id)->delete();
            return redirect()->route('genres-view');
        }catch(\Exception $e){
            session()->flash('error', 'Невозможно удаление данных, пока они используются');
            return redirect()->route('genres-view');
        }
    }
}
