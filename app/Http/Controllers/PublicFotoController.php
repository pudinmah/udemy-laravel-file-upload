<?php

namespace App\Http\Controllers;

use App\Models\PublicFoto;
use App\Http\Requests\StorePublicFotoRequest;
use App\Http\Requests\UpdatePublicFotoRequest;

class PublicFotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePublicFotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublicFotoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PublicFoto  $publicFoto
     * @return \Illuminate\Http\Response
     */
    public function show(PublicFoto $publicFoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PublicFoto  $publicFoto
     * @return \Illuminate\Http\Response
     */
    public function edit(PublicFoto $publicFoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePublicFotoRequest  $request
     * @param  \App\Models\PublicFoto  $publicFoto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePublicFotoRequest $request, PublicFoto $publicFoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PublicFoto  $publicFoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(PublicFoto $publicFoto)
    {
        //
    }
}
