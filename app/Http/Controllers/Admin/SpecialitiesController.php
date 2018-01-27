<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpeciality;
use App\Speciality;
use Illuminate\Http\Request;

class SpecialitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = Speciality::paginate(10);

        return view('admin.specialities.index')->with('specialities', $specialities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specialities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpeciality $request)
    {
        $speciality = new Speciality([
            'name_short' => $request->get('specialityShortName'),
            'name_long' => $request->get('specialityLongName')
        ]);

        $speciality->save();

        return redirect('admin/specialities');
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
        $speciality = Speciality::find($id);

        return view('admin.specialities.edit', compact('speciality', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSpeciality $request, $id)
    {
        $speciality = Speciality::find($id);
        $speciality->name_short = $request->get('specialityShortName');
        $speciality->name_long = $request->get('specialityLongName');
        $speciality->save();

        return redirect('/admin/specialities')->with('success', 'Speciality was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speciality = Speciality::find($id);
        $speciality->delete();

        return redirect('/admin/specialities')->with('success', 'The speciality was deleted!');
    }
}
