<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ElectionsController extends Controller
{
    public function create()
    {
        return view('elections.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        Task::create($input);
        return redirect()->back();
    }
    public function index()
    {
        return view('elections');
    }
}
