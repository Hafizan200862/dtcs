<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function dentist(){
        return $this->belongsTo(User::class, 'user_id'); // specific the column
    }

    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id'); // specific the column
    }
}
