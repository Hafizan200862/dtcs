<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    // protected $fillable = [
        
    // ];

    public function sessions()
    {
        return $this->belongsToMany(Session::class)->withPivot('tooth_id');
    }
    public function teeth()
    {
        return $this->belongsToMany(Tooth::class)->withPivot('session_id');
    }
}
