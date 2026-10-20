<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['name', 'specialization'];

    public function appointments()
    {
        return $this->hasMany(\App\Models\Appointment::class);
    }
}