@extends('layouts.app')

@section('title','My Appointments')

@section('content')
<div class="container">
    <h2>My Appointments</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if($appointments->count())
        <div class="table-wrapper">
            <table>
            <tr>
                <th>Doctor</th>
                <th>Specialization</th>
                <th>Date</th>
                <th>Time</th>
                <th>Action</th>
            </tr>

            @foreach($appointments as $row)
                <tr>
                    <td>{{ $row->doctor->name }}</td>
                    <td>{{ $row->doctor->specialization }}</td>
                    <td>{{ $row->appointment_date }}</td>
                    <td>{{ $row->appointment_time }}</td>
                    <td>
                        <form action="{{ route('appointments.destroy', $row->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Cancel this appointment?')">
                                Cancel
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @else
        <p>You have no appointments booked.</p>
    @endif

    <a href="{{ route('book.form') }}">Book Appointment</a>
</div>
@endsection
