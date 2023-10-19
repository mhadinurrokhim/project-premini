<?php

namespace App\Http\Controllers;

use App\Models\gaji;
use App\Http\Requests\StoregajiRequest;
use App\Http\Requests\UpdategajiRequest;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('User.Gaji');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoregajiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(gaji $gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(gaji $gaji)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdategajiRequest $request, gaji $gaji)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(gaji $gaji)
    {
        //
    }
}
