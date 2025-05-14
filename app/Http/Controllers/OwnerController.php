<?php

namespace App\Http\Controllers;

use App\Http\Requests\OwnerRequest;
use App\Models\Owner;
use Illuminate\Http\Request;


class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = Owner::all();

        return view('owners.index', ['owners' => $owners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('owners.create'        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OwnerRequest $request)
    {
        //$request->validate();
        $owner = new Owner();
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->email=$request->email;
        $owner->phone=$request->phone;
        $owner->address=$request->address;
        $owner->save();

        return redirect()->route('owners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Owner $owner
     * @param $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|object
     */
    public function edit(Owner $owner, Request $request)
    {
        if (! $request->user()->can('editOwner', $owner) ){
            return redirect()->route('owners.index');
        }
        return view('owners.edit', ['owner' => $owner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owner $owner)
    {
        //$request->validate();

        if (!$request->user()->can('editOwner', $owner)) {
            return redirect()->route(route: 'owners.index');

        }
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->email = $request->email;
        $owner->phone = $request->phone;
        $owner->address = $request->address;
        $owner->save();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner, Request $request)
    {

        if (! $request->user()->can('deleteOwner', $owner) ){
            return redirect()->route('owners.index');
    }
        $owner->delete();
        return redirect()->route('owners.index');
    }
}
