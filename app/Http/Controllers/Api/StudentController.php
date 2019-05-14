<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;

class StudentController extends Controller
{
    public function index(){

      $students = Student::all();

      return response()->json($students);
    }

    public function create(Request $request){
      $data = $request->all();

      $validatedData = $request->validate([
        'name' => 'required',
        'surname' => 'required',
        'class' => 'required'
      ]);

      $newStudent = new Student;
      $newStudent->fill($validatedData);
      $newStudent->save();
    }
}
