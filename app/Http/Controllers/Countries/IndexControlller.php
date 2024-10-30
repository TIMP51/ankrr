<?php
namespace App\Http\Controllers\Countries;

use App\Http\Controllers\Controller;
use App\Models\Countries;

class IndexControlller extends Controller
{
    //
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        $countries = new Countries();
        return view('/countries/countriesView',['name'=>$countries->get()]);
    }
}
