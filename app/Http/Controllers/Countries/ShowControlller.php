<?php
namespace App\Http\Controllers\Countries;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\Studios;

class ShowControlller extends Controller
{
    //

    public function __invoke($id)
    {
        // TODO: Implement __invoke() method.
        $countries = new Countries();
        return view('/countries/countriesOne',['name'=>$countries->find($id)]);
    }
}
