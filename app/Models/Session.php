<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Session extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class); // specific the column
    }

    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('tooth_id');
    }
    public function teeth()
    {
        return $this->belongsToMany(Tooth::class)->withPivot('service_id');
    }
}
