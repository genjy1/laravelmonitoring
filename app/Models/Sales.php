<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //
    use HasFactory;

    public function machine()
    {
        return $this->belongsTo(Machine::class,'machine_id');
    }
}
