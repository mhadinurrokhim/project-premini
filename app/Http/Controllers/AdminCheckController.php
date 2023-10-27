<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\AdminCheck;
use App\Http\Requests\StoreAdminCheckRequest;
use App\Http\Requests\UpdateAdminCheckRequest;

class AdminCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Check()
    {
        $absensi = Absensi::all();
        return view('Admin.Check',compact('absensi'));
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
    public function store(StoreAdminCheckRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminCheck $adminCheck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminCheck $adminCheck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminCheckRequest $request, AdminCheck $adminCheck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminCheck $adminCheck)
    {
        //
    }
}
