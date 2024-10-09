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
        // dd('fungsi index');
        return response()->view('public-foto.index', [
            'public_fotos' => PublicFoto::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     // http://127.0.0.1:8000/public-foto
     *
     */
    public function create()
    {
        // dd('fungsi create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePublicFotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublicFotoRequest $request)
    {
        dd('fungsi store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PublicFoto  $publicFoto
     * @return \Illuminate\Http\Response
     // http://127.0.0.1:8000/public-foto/1
     *
     */
    public function show(PublicFoto $publicFoto)
    {
        dd('fungsi show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PublicFoto  $publicFoto
     * @return \Illuminate\Http\Response
       //  http://127.0.0.1:8000/public-foto/2/edit
     *
     */
    public function edit(PublicFoto $publicFoto)
    {
        dd('fungsi edit');
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
        dd('fungsi update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PublicFoto  $publicFoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(PublicFoto $publicFoto)
    {
        dd('fungsi destroy');
    }
}
