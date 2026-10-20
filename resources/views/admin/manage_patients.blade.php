@extends('layouts.app')

@section('title','Manage Patients')

@section('content')
<div class="dashboard-container">
    @include('admin.partials.sidebar')
    <section class="main-section">
        <h2>Manage Patients</h2>
        <table>
            <tr><th>Name</th><th>Email</th><th>Action</th></tr>
            @foreach($patients as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->email }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.patients.destroy', $p->id) }}">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this patient?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
</div>
@endsection