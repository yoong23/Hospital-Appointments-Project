<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::latest()->get();
        return view('admin.manage_doctors', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'specialization' => 'required']);
        Doctor::create($request->only('name', 'specialization'));
        return redirect()->route('doctors.index');
    }

    public function destroy($id)
    {
        Doctor::findOrFail($id)->delete();
        return redirect()->route('doctors.index');
    }
}