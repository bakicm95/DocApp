<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Patient;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $completed_appointments = Appointment::orderBy('id', 'desc')->where('checked', 'false')->paginate(10);
        $scheduled_appointments = Appointment::orderBy('id', 'desc')->where('checked', 'true')->paginate(10);
        return view('manage.appointments.index', compact('completed_appointments', 'scheduled_appointments', 'patients'));
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
        $month = $request->appointment_date_month;
        $days = $request->appointment_date_days;
        $hours = $request->appointment_date_hours;
        $minutes = $request->appointment_date_minutes;


        if($days && $hours && $minutes){
             $this->validate($request, [
            'title' => 'required|min:3',
            'report' => 'required|min:5',
            'appointment_date_days' => 'required',
            'appointment_date_hours' => 'required',
            'appointment_date_minutes' => 'required'
        ]);

            
            $date = Carbon::create(2018, $month, $days, $hours, $minutes);

            $appointment = new Appointment();
            $appointment->doctor_id = auth()->user()->id;
            $appointment->patient_id = $request->patient_id;
            $appointment->title = $request->title;
            $appointment->patient_name = $request->patient_name;
            $appointment->doctor_name = auth()->user()->name;
            $appointment->report = $request->report;
            $appointment->appointment_date = $date;
            $appointment->checked = $request->checked;


            $appointment->save();

            return redirect()->route('appointments.show', $appointment->id);

        }

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
            $appointment->checked = $request->checked;

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
