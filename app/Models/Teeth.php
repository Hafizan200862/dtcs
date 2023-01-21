<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teeth extends Model
{
    use HasFactory;
    // protected $guarded = ['patient_id'];
    protected $fillable = ['teeth_1','teeth_2','teeth_3','teeth_4','teeth_5','teeth_6','teeth_7','teeth_8','teeth_9','teeth_10','teeth_11','teeth_12','teeth_13',
        'teeth_14','teeth_15','teeth_16','teeth_17','teeth_18','teeth_19','teeth_20','teeth_21','teeth_22','teeth_23','teeth_24','teeth_25','teeth_26','teeth_27',
        'teeth_28','teeth_29','teeth_30','teeth_31','teeth_32'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
