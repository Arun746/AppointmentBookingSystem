<?php

namespace App\Models;

use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Doctors extends Model implements Auditable
{
    use HasFactory,SoftDeletes,\OwenIt\Auditing\Auditable;

    protected $fillable = ['fname',
                           'mname',
                           'lname',
                           'user_id',
                           'department_id',
                           'license_no',
                           'email',
                           'contact',
                           'address',
                           'gender',
                            'dob',
                            'engdob',
                            'specialization',
                            'role',
                            'status',
                             'image',
                            ];

     protected $dates=['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function department()
    {
        return $this ->belongsTo(Department::class,'department_id');
    }
    public function education() {
        return $this->hasMany(Education::class);
    }
    public function experience() {
        return $this->hasMany(Experience::class);
    }

    public function schedule() {
        return $this->hasMany(Schedule::class);
    }

    public function appointment() {
        return $this->hasMany(Appointment::class);
    }
}



