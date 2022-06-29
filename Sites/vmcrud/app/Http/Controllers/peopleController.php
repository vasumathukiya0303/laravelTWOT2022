<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Game;
use App\Models\People;
use App\Models\Plan;
use Illuminate\Http\Request;

class peopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = People::all();
        return view('dashboard',compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $people = People::find(1);
        $plan = Plan::all();
        $people->plans()->sync(collect($plan)->pluck('id'));
        return view('create',compact('people'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:255',
            'company' => 'required|min:3',
            'selected' => 'required',
            'phone' => 'required|min:10|max:10',

        ]);
        $show = People::create($validatedData);
        $show->plans()->sync($validatedData['selected']);
        return redirect('/people')->with('success', 'People is successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $people = People::with('plans')->findOrFail($id);
        return view('edit',compact('people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $validatedData = $request->validate([
            'name' => 'required|min:2|max:255',
            'company' => 'required|min:3',
            'selected' => 'required',
            'phone' => 'required|min:10|max:10'
        ]);

        $people = People::whereId($id);
        $people->update(collect($validatedData)->except('selected')->toArray());
        $people->first()->plans()->sync($validatedData['selected']);
        return redirect('/people')->with('success', 'People Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $people = People::findOrFail($id);
        $people->delete();

        return redirect('/people')->with('success', 'People Data is successfully deleted');
    }
}
