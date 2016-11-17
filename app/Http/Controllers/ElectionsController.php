<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;

class ElectionsController extends Controller
{
    public function create()
    {
        return view('elections.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        Elections::create($input);
        return redirect()->back();
    }
    public function index()
    {
        return view('elections');
    }
    public function show()
    {
        $v = Elections::validate(Input::all());

        if ( $v->passes() ) {
                Elections::create(array(
                        'Name'=>            Input::get('Name'),
                        'Election_Info'=>   Input::get('Election_Info'),
                        'Date'=>            Input::get('Date'),
                        'Election_Type'=>   Input::get("Election_Type"),
                ));

                return 'Thanks for registering this election!';
        } else {
                return Redirect::to('elections')->withErrors($v->getMessages());
        }
    }
}
