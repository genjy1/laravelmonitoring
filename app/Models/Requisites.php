<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requisites extends Model
{
    //
    protected $guarded = ['id'];

    protected $fillable = ['paymentAccount', 'correspondingAccount', 'BIK','bankName','INN','user_id'];
}
