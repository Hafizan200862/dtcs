<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id'); // specific the column
    }

    public function services(){
        return $this->belongsToMany(Service::class);
    }
}
