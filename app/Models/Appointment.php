<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function dentist()
    {
        return $this->belongsTo(User::class, 'user_id'); // specific the column
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id'); // specific the column
    }
}
