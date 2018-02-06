<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudent;
use App\Speciality;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(10);

        return view('admin.students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialities = Speciality::all()->pluck('name_long', 'id');
        $specialities = array('0' => '-- Select Speciality --') + $specialities->all();

        return view('admin.students.create')->with('specialities', $specialities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudent $request)
    {
        $path = $request->file('picture')->store('public/uploads');

        $student = new Student([
            'first_name' => $request->get('firstName'),
            'last_name' => $request->get('lastName'),
            'faculty_number' => $request->get('facultyNumber'),
            'speciality_id' => $request->get('speciality_id'),
            'picture' => basename($path)
        ]);

        $student->save();

        return redirect('admin/students');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $specialities = Speciality::all()->pluck('name_long', 'id');

        return view('admin.students.edit', compact('student', 'id'))->with('specialities', $specialities);
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
        $student = Student::find($id);
        $student->speciality_id = $request->get('speciality_id');
        $student->save();

        return redirect('/admin/students')->with('success', 'The student was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        Storage::delete('public/uploads/' . $student->picture);
        $student->delete();

        return redirect('/admin/students')->with('success', 'The student was deleted!');
    }
}
