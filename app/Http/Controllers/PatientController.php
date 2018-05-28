<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::orderBy('id', 'desc')->paginate(10);
        return view('manage.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:patients',
            'jmbg' => 'required|min:13|max:13|unique:patients',
            'dateofb' => 'required',
            'gender' => 'required',
            'homeaddress' => 'required',
            'phonenumber' => 'required',
        ]);

        $doctor_id = auth()->user()->id;
        

        $patient = new Patient();

        $patient->name = $request->name;
        $patient->doctor_id = $doctor_id;
        $patient->email = $request->email;
        $patient->jmbg = $request->jmbg;
        $patient->dateofb = $request->dateofb;
        $patient->gender = $request->gender;
        $patient->homeaddress = $request->homeaddress;
        $patient->phonenumber = $request->phonenumber;

        $patient->save();

        return redirect()->route('patients.show', $patient->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('manage.patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }
}
