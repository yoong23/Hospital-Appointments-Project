<aside class="sidebar">
    <div class="sidebar-header">
        <h2>Hospital Admin</h2>
    </div>
    <ul class="nav-links">
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('doctors.index') }}">Doctors</a></li>
        <li><a href="{{ route('admin.patients.index') }}">Patients</a></li>
        <li><a href="{{ route('admin.appointments.index') }}">Appointments</a></li>
        <li>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="logout">Logout</button>
            </form>
        </li>
    </ul>
</aside>