<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountriesRequest;
use App\Models\Countries;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    //
    public  function countiesIndex(){
        return view('/countries/countries');
    }
    public function countriesCreate(CountriesRequest $req){
        $countries = new Countries();
        $countries->name=$req->input('name');
        $countries->save();
        return redirect()->route('countries-view');
    }
    public function countriesView(){
        $countries = new Countries();
        return view('/countries/countriesView',['name'=>$countries->orderBy('name','asc')->get()]);
    }
    public function countriesOne($id){
        $countries = new Countries();
        return view('/countries/countriesOne',['name'=>$countries->find($id)]);
    }
    public function countriesOneUpdate($id, CountriesRequest $req){
        $countries = Countries::find($id);
        $countries->name=$req->input('name');
        $countries->save();
        return redirect()->route('countries-view');
    }
    public function countriesDelete($id){
        try {
            Countries::find($id)->delete();
            return redirect()->route('countries-view');
        }catch (\Exception $e){
            session()->flash('error', 'Невозможно удаление данных, пока они используются');
            return redirect()->route('countries-view');
        }
    }
}
