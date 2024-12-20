<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Machine extends Model
{
    use HasFactory;
    //
    protected $fillable = ['number','address','name'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
