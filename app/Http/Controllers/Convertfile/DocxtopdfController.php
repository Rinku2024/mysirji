<?php

namespace App\Http\Controllers\convertfile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocxtopdfController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('frontend.convertfile.wordtopdf');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
