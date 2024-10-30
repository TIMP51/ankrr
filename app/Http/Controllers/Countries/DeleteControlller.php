<?php
namespace App\Http\Controllers\Countries;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\Studios;

class DeleteControlller extends Controller
{
    //
    public function __invoke($id)
    {
        // TODO: Implement __invoke() method.
        Countries::find($id)->delete();
        return redirect()->route('countries');
    }
}
