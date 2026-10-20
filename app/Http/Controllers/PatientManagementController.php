<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PatientManagementController extends Controller
{
    public function index()
    {
        $patients = User::latest()->get();
        return view('admin.manage_patients', compact('patients'));
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.patients.index');
    }
}