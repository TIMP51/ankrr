<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudioRequest;
use App\Models\Countries;
use App\Models\Studios;
use Illuminate\Http\Request;

class StudiosController extends Controller
{
    //
    public function studios()
    {
        $country = Countries::all();
        return view('studios/studios', compact( 'country'));
    }

    public function studiosCreate(StudioRequest $req)
    {
        $studios = new Studios();
        $studios->name = $req->input('name');
        $studios->country_id = $req->input('country_id');
        $studios->save();
        return redirect()->route('studios-view');
    }
    public function studiosView(){
        $studios = Studios::all();
        return view('/studios/studiosView',['studios'=>$studios]);
    }
    public function studiosOne($id)
    {
        $studios = Studios::all();
        $countries = new Countries();
        return view('/studios/studiosOne', ['studios' => $studios->find($id), 'country' => $countries->all()]);
    }

    public function studiosOneUpdate($id, StudioRequest $req)
    {
        $studios = Studios::find($id);
        $studios->name = $req->input('name');
        $studios->country_id = $req->input('country_id');
        $studios->save();
        return redirect()->route('studios-view');
    }
    public function studiosDelete($id)
    {
        try {
            Studios::find($id)->delete();
            return redirect()->route('studios-view')->with('success', 'Студия была удалина');
        }catch (\Exception $e){
            session()->flash('error', 'Невозможно удаление данных, пока они используются');
            return redirect()->route('studios-view');
        }
    }
}
