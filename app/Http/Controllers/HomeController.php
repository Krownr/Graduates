<?php

namespace App\Http\Controllers;

use App\Student;
use App\Supervisor;
use App\Thesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supervisors = Supervisor::all()->pluck('full_name', 'id');
        $supervisors = array('0' => '-- Select Supervisor --') + $supervisors->all();

        return view('home')->with('supervisors', $supervisors);
    }

    public function search()
    {
        $student = Input::get('student');
        $supervisor = Input::get('supervisor');
        $topic = Input::get('topic');

        $searchStudent = Student::where('first_name', $student)->orWhere('last_name', $student)->first();
        $searchTopic = Thesis::where('topic', $topic)->first();

        if (!$searchStudent) {
            if (!$searchTopic) {
                $result = Thesis::where('supervisor_id', $supervisor);
            }
            else {
                $result = Thesis::where('supervisor_id', $supervisor)->orWhere('id', $searchTopic->id);
            }
        }
        else {
            if (!$searchTopic) {
                $result = Thesis::where('student_id', $searchStudent->id)->orWhere('supervisor_id', $supervisor);
            }
            else {
                $result = Thesis::where('student_id', $searchStudent->id)->orWhere('supervisor_id', $supervisor)->orWhere('id', $searchTopic->id);
            }
        }

        return view('theses.index', ['theses' => $result->paginate(10)]);
    }
}
