<?php
namespace App\Http\Controllers\Countries;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountriesRequest;
use App\Models\Countries;
use App\Models\Studios;

class UpdateControlller extends Controller
{
    //
    public function __invoke($id, CountriesRequest $req)
    {
        // TODO: Implement __invoke() method.
        $countries = Countries::find($id);
        $countries->name=$req->input('name');
        $countries->save();
        return redirect()->route('countries-view');
    }
}
