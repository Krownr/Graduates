<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupervisor;
use App\Supervisor;
use Illuminate\Http\Request;

class SupervisorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supervisors = Supervisor::paginate(10);

        return view('supervisors.index')->with('supervisors', $supervisors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supervisors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupervisor $request)
    {
        $supervisor = new Supervisor([
            'first_name' => $request->get('firstName'),
            'last_name' => $request->get('lastName')
        ]);

        $supervisor->save();

        return redirect('supervisors');
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
        $supervisor = Supervisor::find($id);

        return view('admin.supervisors.edit', compact('supervisor', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSupervisor $request, $id)
    {
        $supervisor = Supervisor::find($id);
        $supervisor->first_name = $request->get('firstName');
        $supervisor->last_name = $request->get('lastName');
        $supervisor->save();

        return redirect('supervisors')->with('success', 'The supervisor was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supervisor = Supervisor::find($id);
        $supervisor->delete();

        return redirect('supervisors')->with('success', 'The supervisor was deleted!');
    }
}
