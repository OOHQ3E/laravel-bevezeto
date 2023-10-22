<?php

namespace App\Http\Controllers;

use App\Models\termekek;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TermekekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $termekek = Termekek::all();

        return view('index',[
            'termekek' => $termekek
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                'megnevezes' => 'required|max:50',
                'tipus' => 'required|max:50',
                'ar' => 'required|integer|between:1,99999'
                ]
        );
        $termek = new termekek;
        $termek ->megnevezes = $request->get("megnevezes");
        $termek ->tipus = $request->get("tipus");
        $termek ->ar = $request->get("ar");

        $termek->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(termekek $termek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(termekek $termek)
    {
        return view('modify',[
            'termek' => $termek
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, termekek $termek)
    {
        $request->validate([
                'megnevezes' => 'required|max:50',
                'tipus' => 'required|max:50',
                'ar' => 'required|integer|between:1,99999'
            ]
        );
        $temp_termek = $termek;
        $temp_termek ->megnevezes = $request->get("megnevezes");
        $temp_termek ->tipus = $request->get("tipus");
        $temp_termek ->ar = $request->get("ar");
        $temp_termek -> updated_at = Carbon::now();
        $termek->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(termekek $termek)
    {
        $termek->delete();
        return redirect('/');
    }
}
