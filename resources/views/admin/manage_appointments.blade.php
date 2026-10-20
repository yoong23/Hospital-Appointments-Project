@extends('layouts.app')

@section('title','Manage Appointments')

@section('content')
<div class="dashboard-container">
    @include('admin.partials.sidebar')
    <section class="main-section">
        <h2>Appointment List</h2>
        <table>
            <tr><th>Patient</th><th>Doctor</th><th>Date</th><th>Time</th><th>Action</th></tr>
            @foreach($appointments as $a)
                <tr>
                    <td>{{ $a->user->name }}</td>
                    <td>{{ $a->doctor->name }}</td>
                    <td>{{ $a->appointment_date }}</td>
                    <td>{{ $a->appointment_time }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.appointments.destroy', $a->id) }}">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this appointment?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
</div>
@endsection