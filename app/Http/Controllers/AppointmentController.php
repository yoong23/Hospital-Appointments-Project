<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        $doctors = Doctor::all();
        return view('appointments.book', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
        ]);

        Appointment::create([
            'user_id' => auth()->id(), // ✅ WORKS IN BROWSER
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
        ]);

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment booked successfully.');
    }

    public function index()
    {
        $appointments = Appointment::where('user_id', auth()->id())
            ->with('doctor')
            ->latest()
            ->get();

        return view('appointments.index', compact('appointments'));
    }
}
