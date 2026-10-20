<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\User;

class AdminPanelController extends Controller
{
    public function index()
    {
        $doctors = Doctor::count();
        $patients = User::count();
        $appointments = Appointment::count();
        $recentAppointments = Appointment::with(['user', 'doctor'])->latest()->take(5)->get();

        return view('admin.dashboard', compact('doctors', 'patients', 'appointments', 'recentAppointments'));
    }

    public function appointments()
    {
        $appointments = Appointment::with(['user', 'doctor'])->latest()->get();
        return view('admin.manage_appointments', compact('appointments'));
    }

    public function destroyAppointment($id)
    {
        Appointment::findOrFail($id)->delete();
        return redirect()->route('admin.appointments.index')->with('success', 'Appointment deleted.');
    }
}