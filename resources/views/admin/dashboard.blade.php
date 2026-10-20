@extends('layouts.app')

@section('title','Admin Dashboard')

@section('content')
<div class="dashboard-container">
    @include('admin.partials.sidebar')
    <section class="main-section">
        <header class="top-nav">
            <h1>Appointment Management Dashboard</h1>
            <div class="admin-profile"><span>{{ session('admin') }}</span></div>
        </header>

        <div class="dashboard-cards">
            <div class="card"><h3>Doctors</h3><p>{{ $doctors }}</p></div>
            <div class="card"><h3>Patients</h3><p>{{ $patients }}</p></div>
            <div class="card"><h3>Appointments</h3><p>{{ $appointments }}</p></div>
        </div>

        <div class="recent-table">
            <h2>Recent Appointments</h2>
            <table>
                <thead><tr><th>Patient</th><th>Doctor</th><th>Date</th><th>Time</th></tr></thead>
                <tbody>
                @foreach($recentAppointments as $row)
                    <tr>
                        <td>{{ $row->user->name }}</td>
                        <td>{{ optional($row->doctor)->name }}</td>
                        <td>{{ $row->appointment_date }}</td>
                        <td>{{ $row->appointment_time }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection