<?php
namespace App\Http\Controllers\Countries;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountriesRequest;
use App\Models\Countries;

class CreateControlller extends Controller
{
    //
    public function __invoke(CountriesRequest $req)
    {
        // TODO: Implement __invoke() method.
        $countries = new Countries();
        $countries->name=$req->input('name');
        $countries->save();
        return redirect()->route('countries-view');
    }
}
