<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Owner::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $owner = new Owner();
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->email=$request->email;
        $owner->phone=$request->phone;
        $owner->address=$request->address;
        $owner->save();

        return $owner;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Owner::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $owner = Owner::find($id);
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->email=$request->email;
        $owner->phone=$request->phone;
        $owner->address=$request->address;
        $owner->save();

        return $owner;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Owner::destroy($id);
        return $id;
    }
}
