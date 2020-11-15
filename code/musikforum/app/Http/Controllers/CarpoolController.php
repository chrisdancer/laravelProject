<?php

namespace App\Http\Controllers;

use App\Models\Carpool;
use Illuminate\Http\Request;

class CarpoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carpools = Carpool::latest()->paginate(5);

        return view('layouts.carpools.index',compact('carpools'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.carpools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'driverName' => 'required',
            'departureLocation' => 'required',
            'destination' => 'required',
            'show' => 'required'
        ]);

        Carpool::create($request->all());

        return redirect()->route('layouts.carpools.index')
            ->with('success','Carpool created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carpool  $carpool
     * @return \Illuminate\Http\Response
     */
    public function show(Carpool $carpool)
    {
        return view('layouts.carpools.show',compact('carpool'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carpool  $carpool
     * @return \Illuminate\Http\Response
     */
    public function edit(Carpool $carpool)
    {
        return view('layouts.carpools.edit',compact('carpool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carpool  $carpool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carpool $carpool)
    {
        $request->validate([
            'driverName' => 'required',
            'departureLocation' => 'required',
            'destination' => 'required',
            'show' => 'required'
        ]);

        $carpool->update($request->all());

        return redirect()->route('layouts.carpools.index')
            ->with('success','Carpool updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carpool  $carpool
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carpool $carpool)
    {
        $carpool->delete();

        return redirect()->route('layouts.carpools.index')
            ->with('success','Carpool deleted successfully');
    }
}
