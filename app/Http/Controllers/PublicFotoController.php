<?php

namespace App\Http\Controllers;

use App\Models\PublicFoto;
use App\Http\Requests\StorePublicFotoRequest;
use App\Http\Requests\UpdatePublicFotoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        // ddd(Auth::user()->id);

        return response()->view('public-foto.index', [
            'public_fotos' => PublicFoto::where('user_id', Auth::user()->id)->paginate(5),
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
        return response()->view('public-foto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePublicFotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublicFotoRequest $request)
    {
        // dd('fungsi store');

        //upload file
        $request->file('foto')->store('public');
        //create new public foto
        PublicFoto::create([
            'name' => $request->name,
            'path' => $request->file('foto')->hashName(),
            'user_id' => Auth::user()->id,
        ]);
        //redirect to index
        return response()->redirectTo(route('public-foto.index'));
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
        // dd('fungsi show');

        // jika bukan user_id maka redirect ke index
        if ($publicFoto->user_id != Auth::user()->id) {
            return response()->redirectTo(route('public-foto.index'));
        }

        return response()->view('public-foto.show', compact('publicFoto'));

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
        // dd('fungsi edit');

        // jika bukan user_id maka redirect ke index
        if ($publicFoto->user_id != Auth::user()->id) {
            return response()->redirectTo(route('public-foto.index'));
        }

        return response()->view('public-foto.edit', compact('publicFoto'));
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
        // dd('fungsi update');

        // jika bukan user_id maka redirect ke index
        if ($publicFoto->user_id != Auth::user()->id) {
            return response()->redirectTo(route('public-foto.index'));
        }

        //simpen foto yang lama
        $oldFoto = $publicFoto->path;
        //upload file ke public storage
        $request->file('foto')->store('public');
        //update data public foto di database
        $publicFoto->update([
            'name' => $request->name,
            'path' => $request->file('foto')->hashName(),
        ]);

        //hapus file foto yang lama
        Storage::disk('public')->delete($oldFoto);
        //redirect ke halaman index foto
        return response()->redirectTo(route('public-foto.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PublicFoto  $publicFoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(PublicFoto $publicFoto)
    {
         // dd('fungsi destroy');

         // jika bukan user_id maka redirect ke index
        if ($publicFoto->user_id != Auth::user()->id) {
            return response()->redirectTo(route('public-foto.index'));
        }

        // Mengecek apakah user yang sedang login adalah pemilik dari publicFoto
        if ($publicFoto->user_id != Auth::user()->id) {
            // Jika bukan pemilik, redirect ke halaman daftar public-foto
            return response()->redirectTo(route('public-foto.index'));
        }

        //delete public foto from database
        $publicFoto->delete();

        // Hapus file foto dari storage, jika bukan default.png
        if ($publicFoto->path != 'default.png') {
            Storage::disk('public')->delete($publicFoto->path);
        }

        return redirect()->route('public-foto.index');
    }
}
