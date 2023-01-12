<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Session extends Model
{
    use HasFactory;
    protected $guarded = [];

    // protected $fillable = [
    //     ''
    // ];

    public function treatment()
    {
        return $this->belongsToMany(Treatment::class, 'treatment_id'); // specific the column
    }


    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class); // specific the column
    }
}
