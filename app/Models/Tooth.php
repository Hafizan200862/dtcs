<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tooth extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function sessions()
    {
        return $this->belongsToMany(Session::class)->withPivot('service_id');
    }
    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('session_id');
    }
}
