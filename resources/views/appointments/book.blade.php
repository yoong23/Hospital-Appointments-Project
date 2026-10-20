@extends('layouts.app')

@section('title','Book Appointment')

@section('content')
<div class="auth-center">
    <div class="container appointment-card">

        <h2> Book an Appointment</h2>

        <form method="POST" action="{{ route('book.store') }}">
            @csrf

            <!-- Doctor -->
            <label>Doctor</label>
            <select name="doctor_id" required>
                <option value="">-- Select Doctor --</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">
                        Dr. {{ $doctor->name }} - {{ $doctor->specialization }}
                    </option>
                @endforeach
            </select>

            <!-- Date -->
            <label>Date</label>
            <input type="date" name="appointment_date" required>

            <!-- Time -->
            <label>Time</label>
            <input type="time" name="appointment_time" required>

            <button type="submit" class="primary-btn">
                Book Appointment
            </button>
        </form>

    </div>
</div>
@endsection
