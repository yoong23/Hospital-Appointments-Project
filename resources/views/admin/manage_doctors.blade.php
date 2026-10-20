@extends('layouts.app')

@section('title','Manage Doctors')

@section('content')
<div class="dashboard-container">
    @include('admin.partials.sidebar')
    <section class="main-section">
        <h2>Manage Doctors</h2>
        <form method="POST" action="{{ route('doctors.store') }}">
            @csrf
            <input type="text" name="name" placeholder="Doctor Name" required>
            <input type="text" name="specialization" placeholder="Specialization" required>
            <button type="submit">Add Doctor</button>
        </form>

        <table>
            <tr><th>Name</th><th>Specialization</th><th>Action</th></tr>
            @foreach($doctors as $d)
                <tr>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->specialization }}</td>
                    <td>
                        <form method="POST" action="{{ route('doctors.destroy', $d->id) }}">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this doctor?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
</div>
@endsection