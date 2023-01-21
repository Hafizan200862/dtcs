<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Session extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function appointment()
    {
        return $this->belongsTo(Appointment::class); // specific the column
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class); // specific the column
    }

    public function services()
    {
        // return $this->belongsToMany(Service::class)->withPivot('tooth_id',['teeth_no','service_remark']);
        return $this->belongsToMany(Service::class)->withPivot(['teeth_no','service_remark']);
    }
    
    public function teeth()
    {
        return $this->hasMany(Teeth::class);
    }
    
}
