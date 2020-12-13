<?php

namespace App\Http\Controllers;

use App\Tableros;
use Illuminate\Http\Request;

class TablerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return view('tableros.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tableros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tableros  $tableros
     * @return \Illuminate\Http\Response
     */
    public function show(Tableros $tableros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tableros  $tableros
     * @return \Illuminate\Http\Response
     */
    public function edit(Tableros $tableros)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tableros  $tableros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tableros $tableros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tableros  $tableros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tableros $tableros)
    {
        //
    }
}
