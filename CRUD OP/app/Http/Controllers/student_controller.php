<?php

namespace App\Http\Controllers;

use App\student;
use Illuminate\Http\Request;
use App\Imports\student_Import;
use Excel;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Auth\Events\Validated;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\ExcelServiceProvider;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class student_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flag = false;
        $students = DB::table('students')->get();


        $country_list = DB::table('countries')
            ->select('name', 'id')
            ->orderBy('name')
            // ->groupBy('name')
            ->get();

        // return view('index')->with('country_list',$country_list);

        return view('students/index', compact('students', 'country_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return "aditya";


        $validateData = $request->validate([
            'name' => 'required|min:3|max:50',
            'age' => 'required|min:2|max:10',
            'street' => 'required|min:5|max:20',
            'email' => 'required|email',

        ]);



        $students = new student;


        $students->name = $request->input('name');
        $students->email = $request->input('email');
        $students->designation = $request->input('street');
        $students->salary = $request->input('age');
        $students->date = $request->input('date');
        $students->save();

        return "success";
        // return redirect('students/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return $id;

        $id = $request->input('hidden');
        // return $id;
        $validateData = $request->validate([
            'name' => 'required|min:3|max:50',
            'age' => 'required|min:2|max:10',
            'street' => 'required|min:5|max:20',
            'email' => 'required|email',

        ]);




        $students = student::find($id);
        $students->name = $request->input('name');
        $students->email = $request->input('email');
        $students->designation = $request->input('street');
        $students->salary = $request->input('age');
        $students->date = $request->input('date');




        $students->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = student::find($id);
        $student->delete();
        return $student;
    }

    public function importForm()
    {

        return view('students/form');
    }


    public function import(Request $request)
    {

        Excel::import(new student_Import, $request->file);
        return redirect('/');
    }
    public function getData()
    {
        $students = DB::table('students AS A')
            ->select('A.id', 'A.name', 'A.email', 'A.designation', 'A.salary', 'A.date')
            ->get();


        $output = array("data" => array());
        foreach ($students as $row) {
            $output['data'][] = $row;
        }

        echo json_encode($output);
    }



    function getState($countryID)
    {

        // return "here";
        $state = DB::table('states')
            ->select('name', 'id')
            ->where('country_id', '=', $countryID)
            ->orderBy('name')
            ->get();
        // $state = DB::table('states')
        // ->select('states.name')
        // ->rightJoin('countries', $countryID, '=', 'country_id')
        // ->where('id','=','countries.id')
        // ->get();
        return $state;
    }

    function getCity($stateID)
    {

        // return "here";
        $city = DB::table('cities')
            ->select('name', 'id')
            ->where('state_id', '=', $stateID)
            ->orderBy('name')
            // ->groupBy('name')
            ->get();

        return $city;
    }
}
