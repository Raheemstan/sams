<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        return response()->json($student);
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
            'surname' => ['required', 'string'],
            'othername' => ['required', 'string'],
            'dob' => ['required', 'date'],
            'class_arm' => ['required', 'string'],
            'class' => ['required', 'string'],
            'passport' => ['string'],
            'pg_id' => ['string'],
            'student_id' => ['required', 'string']
        ]);

        $stid = date("Y") . "/" . $request->input('student_id');

        try {
            $student = new Student();
            $student->student_id = $stid;
            $student->surname = $request->input('surname');
            $student->othername = $request->input('othername');
            $student->dob = $request->input('dob');
            $student->class = $request->input('class');
            $student->class_arm = $request->input('class_arm');
            $student->passport = $request->input('passport');
            $student->pg_id = $request->input('pg_id');

            $student->save();

            return response()->json([
                'status' => 200,
                'message' => 'Student registered Successfully'
            ]);
        } catch (\Throwable $th) {

            return response()->json([
                'status' => 403,
                'message' => $th
            ]);
        }
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $student = Student::where('student_id', $id)->delete();
            if ($student) {
                return response()->json([
                    'status' => 200,
                    'message' => "Student Deleted Successfully",
                    'otherstudents' => $this->index()
                ]);
            }else {
                return response()->json([
                    'status' => 400,
                    'message' => "Student Deleted Unuccessful !!",
                    'otherstudents' => $this->index()
                ]);                
            }
            // return $this->index();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
