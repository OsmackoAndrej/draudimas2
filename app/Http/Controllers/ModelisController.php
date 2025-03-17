<?php

namespace App\Http\Controllers;

use App\Models\Modelis;
use App\Models\Brand;
use Illuminate\Http\Request;

class ModelisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modeliai = Modelis::all();
        return view('modeliai.index', compact('modeliai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lecturers = Brand::all();
        return view('modeliai.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $modelis= new Modelis();
        $modelis->title=$request->title;
        $modelis->brand_id=$request->brand_id;
        $modelis->save();
        return redirect()->route('modeliai.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Modelis $modelis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modelis $modelis)
    {
        $brands = Brand::all();
        return view('modeliai.edit', compact('Modelis', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modelis $modelis)
    {
        $modelis->title=$request->title;
        $modelis->brand_id=$request->brand_id;
        $modelis->save();

        return redirect()->route('modeliai.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modelis $course)
    {
        //
    }
}
