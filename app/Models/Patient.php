<?php

namespace App\Models;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function user()
{
    return $this->belongsTo(User::class);
}
   public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'patient_id');
    }

    public function doctors()
{
    return $this->belongsToMany(Doctor::class, 'patient__doctors', 'patient_id', 'doctor_id')->withTimestamps();
}

    public function MedicalRecords()
    {
    return $this->hasMany(MedicalRecord::class);
    }

}
