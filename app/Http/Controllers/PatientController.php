<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Appointment;

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
        // Validate data
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
        

        // Create new Patient
        $patient = new Patient();

        $patient->name = $request->name;
        $patient->doctor_id = $doctor_id;
        $patient->email = $request->email;
        $patient->jmbg = $request->jmbg;
        $patient->dateofb = $request->dateofb;
        $patient->gender = $request->gender;
        $patient->homeaddress = $request->homeaddress;
        $patient->phonenumber = $request->phonenumber;

        // Save and redirect
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
        $appointments = Appointment::where('patient_id', $id)->paginate(5);
        return view('manage.patients.show', compact('patient', 'appointments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('manage.patients.edit', compact('patient'));
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
        // Find Patient, and validate data
        $patient = Patient::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:patients,email,'.$patient->id,
            'jmbg' => 'required|min:13|max:13|unique:patients,jmbg,'.$patient->id,
            'dateofb' => 'required',
            'gender' => 'required',
            'homeaddress' => 'required',
            'phonenumber' => 'required',
        ]);

        // Save edited data and redirect
        $patient->name = $request->name;
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
