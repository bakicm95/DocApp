<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $patients = Patient::all();
        $appointments = Appointment::orderBy('id', 'desc')->paginate(5);
        return view('manage.appointments.index', compact('appointments', 'patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.appointments.create');
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
            'title' => 'required|min:3',
            'report' => 'required|min:5'
        ]);

        $appointment = new Appointment();
        $appointment->doctor_id = auth()->user()->id;
        $appointment->patient_id = $request->patient_id;
        $appointment->title = $request->title;
        $appointment->patient_name = $request->patient_name;
        $appointment->doctor_name = auth()->user()->name;
        $appointment->report = $request->report;

        $appointment->save();

        return redirect()->route('appointments.show', $appointment->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('manage.appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);

        $patient_id = $appointment->patient_id;

        $patient = Patient::findOrFail($patient_id);
        return view('manage.appointments.edit', compact('appointment', 'patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'report' => 'required|min:5'
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->title = $request->title;
        $appointment->report = $request->report;

        $appointment->save();

        return redirect()->route('appointments.show', $appointment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
