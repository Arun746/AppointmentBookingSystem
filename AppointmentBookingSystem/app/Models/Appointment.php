<?php

namespace App\Models;

use App\Models\Doctors;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Appointment extends Model implements Auditable
{
    use HasFactory,\OwenIt\Auditing\Auditable;

    protected $fillable = [ 'schedule_id',
                            'doctor_id',
                            'patient_id',
                            'booking_date_bs',
                            'booking_date_ad',
                            'status',
                            'remarks',
                            ];


public function doctor()
    {
        return $this->belongsTo(Doctors::class);
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}



