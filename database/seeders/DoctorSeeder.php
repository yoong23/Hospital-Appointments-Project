<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    public function run()
    {
        $doctors = [
            ['name' => 'Dr. Pheche Prudenciado', 'specialization' => 'Cardiologist'],
            ['name' => 'Dr. Van Paulino', 'specialization' => 'Dermatologist'],
            ['name' => 'Dr. Theo Lustico', 'specialization' => 'Dentist'],
        ];

        foreach ($doctors as $d) {
            Doctor::updateOrCreate(['name' => $d['name']], $d);
        }
    }
}