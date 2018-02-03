<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreThesis;
use App\Student;
use App\Supervisor;
use App\Thesis;
use Illuminate\Http\Request;

class ThesesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theses = Thesis::orderBy('id', 'desc')->paginate(10);

        return view('theses.index')->with('theses', $theses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all()->pluck('full_name', 'id');
        $students = array('0' => '-- Select Student --') + $students->all();

        $supervisors = Supervisor::all()->pluck('full_name', 'id');
        $supervisors = array('0' => '-- Select Supervisor --') + $supervisors->all();

        return view('admin.theses.create')->with('students', $students)->with('supervisors', $supervisors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreThesis $request)
    {
        $thesis = new Thesis([
            'student_id' => $request->get('student'),
            'supervisor_id' => $request->get('supervisor'),
            'topic' => $request->get('topic'),
            'mark' => $request->get('mark'),
            'presentation_date' => $request->get('date')
        ]);

        $thesis->save();

        return redirect('theses');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thesis = Thesis::find($id);

        $supervisors = Supervisor::all()->pluck('full_name', 'id');

        return view('admin.theses.edit', compact('thesis', 'id'))->with('supervisors', $supervisors);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreThesis $request, $id)
    {
        $thesis = Thesis::find($id);
        $thesis->topic = $request->get('topic');
        $thesis->mark = $request->get('mark');
        $thesis->presentation_date = $request->get('date');
        $thesis->supervisor_id = $request->get('supervisor');
        $thesis->save();

        return redirect('theses')->with('success', 'The thesis was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thesis = Thesis::find($id);
        $thesis->delete();

        return redirect('theses')->with('success', 'The thesis was deleted!');
    }
}
